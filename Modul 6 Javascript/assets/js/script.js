const inputValue = document.querySelector(".calculator_display_result input")
const inputOperation = document.querySelector(".calculator_display_operation .value")
document.querySelectorAll(".calculator_keys .num_key").forEach(e => {
    e.onclick = () => (inputValue.value = inputValue.value !== "0" ? inputValue.value + e.innerText : e.innerText);
});

const buffer = [];
const opCallback = opName => () => {
    let currentVal = parseFloat(inputValue.value);
    if (opName === "percent") {
        currentVal *= 0.01;
        inputValue.value = currentVal;
    } else {
        if (buffer && buffer.length) {
            buffer.push({ value: currentVal });

            const result = evaluate(buffer);

            buffer.push({ value: result });
            buffer.push({ value: opName });

            inputValue.value = "";
        } else {
            buffer.push({ value: currentVal });
            buffer.push({ value: opName });
            inputValue.value = "";
        }
    }
}

const evaluate = buffer => {
    const secondOperand = buffer.pop().value;
    const operator = buffer.pop().value;
    const firstOperand = buffer.pop().value;

    switch (operator) {
        case "add":
            return firstOperand + secondOperand;
            break;
        case "subtract":
            return firstOperand - secondOperand;
            break;
        case "multiply":
            return firstOperand * secondOperand;
            break;
        case "divide":
            return firstOperand / secondOperand;
            break;
        default:
            return secondOperand;
    }
}

for (const opName of["add", "subtract", "multiply", "divide", "percent"]) {
    document.querySelector(`.op_key[op=${opName}]`).onclick =
        opCallback(opName);
}

document.querySelector(".eq_key").onclick =
    () => {
        if (buffer && buffer.length) {
            buffer.push({ value: parseFloat(inputValue.value) });
            inputValue.value = evaluate(buffer);
        }
    }

document.querySelector(".op_key[op=clear]").onclick =
    () => {
        inputValue.value = 0;
        buffer.length = 0;
    }

document.querySelector(".op_key[op=negate]").onclick =
    () => inputValue.value = -parseFloat(inputValue.value);