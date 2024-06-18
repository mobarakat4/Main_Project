document.addEventListener('DOMContentLoaded', function() {
    var chatButton = document.getElementById('chatButton');
    var chatPopup = document.getElementById('chatPopup');
    var closeButton = document.querySelector('.close');
    var sendMessageButton = document.getElementById('sendMessage');
    var userMessageInput = document.getElementById('userMessage');
    var chatMessages = document.getElementById('chatMessages');

    // Show the popup when the chat button is clicked
    chatButton.addEventListener('click', function() {
        chatPopup.style.display = 'block';
    });

    // Close the popup when the close button is clicked
    closeButton.addEventListener('click', function() {
        chatPopup.style.display = 'none';
    });

    // Close the popup when clicking outside the popup
    window.addEventListener('click', function(event) {
        if (event.target === chatPopup) {
            chatPopup.style.display = 'none';
        }
    });

    // Handle sending message
    sendMessageButton.addEventListener('click', function() {
        var userMessage = userMessageInput.value.trim();
        if (userMessage) {
            appendMessage('User', userMessage);
            userMessageInput.value = '';

            // Send message to the Laravel backend
            fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: userMessage })
            })
            .then(response => response.json())
            .then(data => {
                if (data.response) {
                    appendMessage('Bot', data.response);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });

    // Append message to chat window
    function appendMessage(sender, message) {
        var messageElement = document.createElement('div');
        messageElement.textContent = `${sender}: ${message}`;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
