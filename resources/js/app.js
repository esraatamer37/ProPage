import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// resources/js/app.js

function editExperience(button) {
    const experienceItem = button.parentElement;
    const title = experienceItem.querySelector('h3');
    const dateLocation = experienceItem.querySelector('p span');
    const description = experienceItem.querySelector('p:nth-of-type(2)');
    
    title.contentEditable = true;
    dateLocation.contentEditable = true;
    description.contentEditable = true;
    
    button.textContent = 'Save';
    button.setAttribute('onclick', 'saveExperience(this)');
}

function saveExperience(button) {
    const experienceItem = button.parentElement;
    const title = experienceItem.querySelector('h3');
    const dateLocation = experienceItem.querySelector('p span');
    const description = experienceItem.querySelector('p:nth-of-type(2)');
    
    title.contentEditable = false;
    dateLocation.contentEditable = false;
    description.contentEditable = false;
    
    button.textContent = 'Edit';
    button.setAttribute('onclick', 'editExperience(this)');
}

function deleteExperience(button) {
    const experienceItem = button.parentElement;
    experienceItem.remove(); // حذف العنصر
}

function addExperience() {
    const experienceContainer = document.getElementById('experience-container');

    const newExperience = document.createElement('div');
    newExperience.className = 'experience-item';
    newExperience.innerHTML = `
        <h3 contentEditable="true">New Job Title</h3>
        <p><span contentEditable="true">Start Date - End Date</span> | <span contentEditable="true">Location</span></p>
        <p contentEditable="true">Job description goes here.</p>
        <button onclick="editExperience(this)">Edit</button>
        <button onclick="deleteExperience(this)">Delete</button>
    `;

    experienceContainer.appendChild(newExperience);
}
