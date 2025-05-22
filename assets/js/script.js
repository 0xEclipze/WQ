document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('nav ul');

    if(mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            navMenu.classList.toggle('show');
        });
    }

    // Share Button Functionality
    const shareBtn = document.querySelector('.share-btn');
    const socialShareOptions = document.querySelector('.social-share-options');

    if(shareBtn) {
        shareBtn.addEventListener('click', function() {
            socialShareOptions.style.display = socialShareOptions.style.display === 'flex' ? 'none' : 'flex';
        });
    }

    // Save Word Functionality
    const saveBtn = document.querySelector('.save-btn');
    
    if(saveBtn) {
        saveBtn.addEventListener('click', function() {
            const word = document.querySelector('.word').textContent;
            let savedWords = JSON.parse(localStorage.getItem('savedWords')) || [];
            
            if(!savedWords.includes(word)) {
                savedWords.push(word);
                localStorage.setItem('savedWords', JSON.stringify(savedWords));
                this.innerHTML = '<i class="fas fa-bookmark"></i> Saved';
                this.classList.add('saved');
            } else {
                savedWords = savedWords.filter(item => item !== word);
                localStorage.setItem('savedWords', JSON.stringify(savedWords));
                this.innerHTML = '<i class="far fa-bookmark"></i> Save';
                this.classList.remove('saved');
            }
        });
    }

    // Check if word is already saved
    const checkSavedStatus = () => {
        const saveBtn = document.querySelector('.save-btn');
        const word = document.querySelector('.word')?.textContent;
        
        if(saveBtn && word) {
            let savedWords = JSON.parse(localStorage.getItem('savedWords')) || [];
            
            if(savedWords.includes(word)) {
                saveBtn.innerHTML = '<i class="fas fa-bookmark"></i> Saved';
                saveBtn.classList.add('saved');
            }
        }
    };

    checkSavedStatus();

    // Push Notification Setup
    const notificationBtn = document.getElementById('enable-notifications');
    
    if(notificationBtn) {
        notificationBtn.addEventListener('click', function() {
            // This is where you would normally integrate with OneSignal
            // For now, we'll just show a mock confirmation
            alert('Notifications enabled! You will now receive daily word updates.');
            this.textContent = 'Notifications Enabled';
            this.disabled = true;
        });
    }

    // Mock function to fetch Word of the Day
    // In a real application, this would connect to your backend
    const fetchWordOfDay = () => {
        // For demonstration purposes, we'll use a hardcoded word
        // In a real app, this would be an API call to your backend
        
        // This demonstrates how you would update the UI with the word data
        // But since we already have a word in the HTML, we don't need to update anything
        console.log('Word of the day fetched successfully!');
    };

    fetchWordOfDay();
});