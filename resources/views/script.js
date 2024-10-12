// script.js

document.querySelector('.message-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent page refresh
    const input = this.querySelector('input');
    const messageText = input.value;

    // Create a new message element
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', 'sent');
    messageElement.innerHTML = `
        <div class="avatar"><img src="your-avatar.jpg" alt="You"></div>
        <div class="message-content">
            <p>${messageText}</p>
            <span class="time">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
        </div>
    `;

    // Append the new message to the messages div
    document.querySelector('.messages').appendChild(messageElement);
    
    // Clear the input
    input.value = '';
    // Scroll to the bottom of the messages
    document.querySelector('.messages').scrollTop = document.querySelector('.messages').scrollHeight;
});
