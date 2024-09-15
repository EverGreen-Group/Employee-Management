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

function updateTaskStatus(taskId) {
    const form = document.getElementById(`status-form-${taskId}`);
    if (!form) {
        console.error(`Form with id status-form-${taskId} not found`);
        showStatusBanner('Error: Form not found', 'error');
        return;
    }

    const formData = new FormData(form);

    fetch('/project-root/update-task-status', {
		method: 'POST',
		body: formData
	})
	.then(response => {
		if (!response.ok) {
			throw new Error(`HTTP error! status: ${response.status}`);
		}
		return response.json();
	})
	.then(data => {
		if (data.success) {
			showStatusBanner('Status updated successfully', 'success');
			updateUIStatus(taskId, formData.get('new_status'));
		} else {
			showStatusBanner(data.message || 'Failed to update status', 'error');
		}
	})
	.catch(error => {
		console.error('Error:', error);
		showStatusBanner(`Error: ${error.message}`, 'error');
	});
}

function showStatusBanner(message, type) {
    const banner = document.createElement('div');
    banner.className = `status-banner ${type}`;
    banner.textContent = message;
    document.body.appendChild(banner);

    setTimeout(() => {
        banner.remove();
    }, 3000);
}

function updateUIStatus(taskId, newStatus) {
    const statusElement = document.querySelector(`#status-form-${taskId} .status`);
    if (statusElement) {
        statusElement.className = `status ${newStatus.toLowerCase().replace(' ', '-')}`;
    }
}