const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

// Function to set theme
function setTheme(isDark) {
    if (isDark) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
    localStorage.setItem('darkMode', isDark);
    switchMode.checked = isDark;
}

// Load saved theme preference
const savedDarkMode = localStorage.getItem('darkMode') === 'true';
setTheme(savedDarkMode);

switchMode.addEventListener('change', function () {
    setTheme(this.checked);
});

// ... rest of the code ...

// Load sidebar and navbar into the index.html
window.addEventListener('DOMContentLoaded', () => {
    loadComponent('sidebar-container', 'components/sidebar.html');
    loadComponent('navbar-container', 'components/navbar.html');
});

function loadComponent(containerId, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            document.getElementById(containerId).innerHTML = data;
        })
        .catch(error => console.error('Error loading component:', error));
}


// ... (existing code remains unchanged)

// Task status update functionality
document.addEventListener('DOMContentLoaded', function() {
    const statusButtons = document.querySelectorAll('.status-btn');
    
    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-task-id');
            const currentStatus = this.getAttribute('data-status');
            const newStatus = currentStatus === 'Completed' ? 'Pending' : 'Completed';
            
            // Send AJAX request to update status
            fetch('/update-task-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `task_id=${taskId}&new_status=${newStatus}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI
                    this.setAttribute('data-status', newStatus);
                    const statusSpan = this.querySelector('.status');
                    statusSpan.textContent = newStatus;
                    statusSpan.className = `status ${newStatus.toLowerCase()}`;
                } else {
                    console.error('Failed to update status');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});