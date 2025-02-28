function copyPassword(button) {
    const passwordField = button.previousElementSibling; // Get the password element
    const textArea = document.createElement("textarea"); // Create a temporary textarea
    textArea.value = passwordField.textContent.trim(); // Get password text
    document.body.appendChild(textArea); // Append textarea to body
    textArea.select(); // Select text
    document.execCommand("copy"); // Copy to clipboard
    document.body.removeChild(textArea); // Remove textarea

    // Remove any existing "Password copied!" messages
    const existingMessage = button.parentElement.querySelector(".copy-message");
    if (existingMessage) {
        existingMessage.remove();
    }

    // Show a temporary message next to the button
    const message = document.createElement("span");
    message.textContent = "✅ Password copied!";
    message.classList.add("copy-message");
    button.parentElement.appendChild(message); // Append message inside the div

    // Remove the message after 2 seconds
    setTimeout(() => {
        message.remove();
    }, 2000);
}
