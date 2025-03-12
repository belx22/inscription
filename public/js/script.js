// Store data in localStorage
let judges = JSON.parse(localStorage.getItem('judges')) || [];
let gymnasts = JSON.parse(localStorage.getItem('gymnasts')) || [];

// Navigation functions
function showSection(sectionId) {
    document.querySelectorAll('.section-content').forEach(section => {
        section.style.display = 'none';
    });
    document.getElementById(sectionId).style.display = 'block';
}

// Toggle between judges and gymnasts tables
function toggleTable(tableType) {
    const judgesTable = document.getElementById('judges-table');
    const gymnastsTable = document.getElementById('gymnasts-table');
    
    if (tableType === 'judges') {
        judgesTable.style.display = 'block';
        gymnastsTable.style.display = 'none';
        renderJudges();
    } else {
        judgesTable.style.display = 'none';
        gymnastsTable.style.display = 'block';
        renderGymnasts();
    }
}

// Handle judge form submission
function handleJudgeSubmit(event) {
    event.preventDefault();
    
    const judge = {
        id: Date.now().toString(),
        firstName: document.getElementById('judge-firstName').value,
        lastName: document.getElementById('judge-lastName').value,
        dateOfBirth: document.getElementById('judge-dateOfBirth').value,
        category: document.getElementById('judge-category').value,
        discipline: document.getElementById('judge-discipline').value,
        photo: document.getElementById('judge-photo').files[0]?.name || ''
    };
    
    judges.push(judge);
    localStorage.setItem('judges', JSON.stringify(judges));
    event.target.reset();
    alert('Juge enregistré avec succès!');
}

// Handle gymnast form submission
function handleGymnastSubmit(event) {
    event.preventDefault();
    
    const gymnast = {
        id: Date.now().toString(),
        firstName: document.getElementById('gymnast-firstName').value,
        lastName: document.getElementById('gymnast-lastName').value,
        dateOfBirth: document.getElementById('gymnast-dateOfBirth').value,
        placeOfBirth: document.getElementById('gymnast-placeOfBirth').value,
        club: document.getElementById('gymnast-club').value,
        discipline: document.getElementById('gymnast-discipline').value,
        photo: document.getElementById('gymnast-photo').files[0]?.name || ''
    };
    
    gymnasts.push(gymnast);
    localStorage.setItem('gymnasts', JSON.stringify(gymnasts));
    event.target.reset();
    alert('Gymnaste enregistré avec succès!');
}

