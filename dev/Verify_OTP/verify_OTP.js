// ======================== FND THE OTP CODE BOX ELEMENT ==============================

// Find the OTP code box
function getCodeBoxElement(index) {
    return document.getElementById('codeBox' + index);
}



// =============== DECIDE WHAT HAPPENS WHEN THE FOCUS IS ON AN OTP CODE BOX ==============

// Handle what happens when a number is inputted into each OTP code box
function onFocusEvent(index) {

    // Work through each of the OTP code boxes
    for (item = 1; item < index; item++) {
        // Get the current OTP code box the focus is on
        const currentElement = getCodeBoxElement(item);

        // If the OTP code box the focus is on has no value
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}



// =============== DECIDE WHAT HAPPENS WHEN A NUMBER IS INPUT INTO AN OTP CODE BOX ==============

// Variable to store number entered at a given OTP code box
var keyEntered;

// Array to store all the numbers that have been entered in the OTP code boxes
var keysEntered = [];


// Handle what happens when the key is released, i.e. a number has just been entered into the OTP code box
function onKeyUpEvent(index, event) {

    // Store the pressed key code into the variable "eventCode"
    const eventCode = event.which || event.keyCode;

    // If the OTP code box has only 1 value
    if (getCodeBoxElement(index).value.length === 1) {

        // If OTP code box that the focus is on is not the final one
        if (index !== 4) {
            // Move the focus to the next OTP code box
            getCodeBoxElement(index + 1).focus();

            keyEntered = String.fromCharCode(eventCode);
            keysEntered.push(keyEntered);
        }
        // If the OTP code box that the focus is on IS the final one (i.e. focus is on the 4th OTP code box)
        else {
            // Remove focus focus from the OTP code box
            getCodeBoxElement(index).blur();

            keyEntered = String.fromCharCode(eventCode);
            keysEntered.push(keyEntered);
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement(index - 1).focus();
    }
}