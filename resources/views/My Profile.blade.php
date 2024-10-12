<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn My Profile Simulation</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f2ef;
            padding: 20px;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #283e4a;
            padding: 15px 0;
            display: flex;
            justify-content: center; /* Center the content */
            align-items: center;
        }

        .navbar .logo img {
            width: 120px;
            margin-right: auto; /* Aligns logo to the left */
            margin-left: 20px; /* Some space from the edge */
        }

        .navbar .nav-links {
            display: flex;
            gap: 30px; /* Adds space between the links */
            justify-content: center;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Main Container */
        .main-container {
            display: flex;
            margin: 20px auto;
            width: 80%;
            justify-content: space-between;
            gap: 20px;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 25%;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: sticky;
            top: 20px;
        }

        .sidebar .profile-overview {
            text-align: center;
        }

        .sidebar .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar .profile-info h1 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .sidebar .connect-btn,
        .sidebar .Followers-btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .connect-btn {
            background-color: #0073b1;
            color: white;
        }

        .Followers-btn {
            background-color: #f3f2ef;
            color: #0073b1;
            border: 1px solid #0073b1;
        }

        /* Profile Content */
        .profile-content {
            width: 70%;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .profile-content h2 {
            border-bottom: 2px solid #0073b1;
            margin-bottom: 15px;
            padding-bottom: 5px;
            color: #0073b1;
        }

        /* Experience Section */
        .experience-item {
            margin-bottom: 20px;
        }

        .experience-item h3 {
            font-size: 1.3em;
            margin-bottom: 5px;
        }

        .experience-item p {
            color: gray;
        }

        .experience-item span {
            font-weight: bold;
            color: #0073b1;
        }

        /* Skills Section */
        .skills-list {
            list-style-type: none;
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
        }

        .skills-list li {
            background-color: #0073b1;
            color: white;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Education Section */
        .education-item {
            margin-bottom: 20px;
        }

        .education-item h3 {
            font-size: 1.3em;
            margin-bottom: 5px;
        }

        .education-item span {
            font-weight: bold;
            color: #0073b1;
        }

        .activity-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }

        h2 {
            font-size: 24px;
        }
        .experience-item {
            margin-bottom: 15px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        button {
            margin-right: 5px;
        }

        input[type="text"], textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        .create-post-btn {
            padding: 10px 15px;
            background-color: #0073b1;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .posts-section {
            margin-top: 20px;
        }

        .post {
            background-color: #fafafa;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .post-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post p {
            font-size: 16px;
            color: #333;
        }

        .post a {
            color: #0073b1;
            text-decoration: none;
        }

        .post a:hover {
            text-decoration: underline;
        }

        .post-interactions {
            margin-top: 10px;
            color: #555;
            font-size: 14px;
        }

        .show-more-btn {
            padding: 10px;
            background-color: #0073b1;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>function editExperience() {

        }

        // Function to edit the 'About' section
        function editAbout() {
            const aboutText = document.getElementById("about-text");
            const editBtn = document.getElementById("edit-btn");
            const saveBtn = document.getElementById("save-btn");

            // Make the text editable
            aboutText.contentEditable = true;
            aboutText.style.border = "1px solid #ccc";

            // Hide Edit button and show Save button
            editBtn.style.display = "none";
            saveBtn.style.display = "inline-block";
        }

        // Function to save changes made to the 'About' section
        function saveAbout() {
            const aboutText = document.getElementById("about-text");
            aboutText.style = undefined;
            const editBtn = document.getElementById("edit-btn");
            const saveBtn = document.getElementById("save-btn");

            // Make the text non-editable
            aboutText.contentEditable = false;
            aboutText.style.border = "none";

            // Hide Save button and show Edit button
            saveBtn.style.display = "none";
            editBtn.style.display = "inline-block";
        }

        // Function to delete the 'About' text
        function deleteAbout() {
            const aboutText = document.getElementById("about-text");

            // Clear the paragraph content
            aboutText.innerText = "";
        }

        // Profile image upload and localStorage logic
        document.addEventListener("DOMContentLoaded", function() {
            const profileUpload = document.getElementById('profile-upload');
            const profileImg = document.getElementById('profileImg');

            // Load saved profile image from localStorage if available
            const savedImage = localStorage.getItem('profileImage');
            if (savedImage) {
                profileImg.src = savedImage;
            }

            // Show alert when clicking on the profile image
            profileImg.onclick = function () {
                alert('Add a profile picture!');
            };

            let reader;
            reader.onload = function (e) {
                const result = e.target.result;
                if (typeof result === 'string') {
                    profileImg.src = result;
                    // Save the image data to localStorage
                    localStorage.setItem('profileImage', result);
                } else {
                    console.error('Unexpected result type:', typeof result);
                }
            };

            // Handle file upload
            profileUpload.onchange = function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        profileImg.src = e.target.result;
                        // Save the image data to localStorage
                        localStorage.setItem('profileImage', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            };

            // Experience editing and deleting
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const experienceItem = this.closest('.experience-item');
                    const title = experienceItem.querySelector('.experience-title');
                    const duration = experienceItem.querySelector('.experience-duration');
                    const location = experienceItem.querySelector('.experience-location');
                    const description = experienceItem.querySelector('.experience-description');

                    title.innerHTML = `<input type="text" value="${title.innerText}" />`;
                    duration.innerHTML = `<input type="text" value="${duration.innerText}" />`;
                    location.innerHTML = `<input type="text" value="${location.innerText}" />`;
                    description.innerHTML = `<textarea>${description.innerText}</textarea>`;

                    experienceItem.querySelector('.save-btn').style.display = 'inline';
                    this.style.display = 'none';
                });
            });

            document.querySelectorAll('.save-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const experienceItem = this.closest('.experience-item');
                    const titleInput = experienceItem.querySelector('input[type="text"]');
                    const durationInput = experienceItem.querySelector('input[type="text"]');
                    const locationInput = experienceItem.querySelector('input[type="text"]');
                    const descriptionTextarea = experienceItem.querySelector('textarea');

                    const data = {
                        id: experienceItem.getAttribute('data-id'),
                        title: titleInput.value,
                        duration: durationInput.value,
                        location: locationInput.value,
                        description: descriptionTextarea.value,
                    };

                    fetch('/save-experience', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                experienceItem.querySelector('.experience-title').innerText = titleInput.value;
                                experienceItem.querySelector('.experience-duration').innerText = durationInput.value;
                                experienceItem.querySelector('.experience-location').innerText = locationInput.value;
                                experienceItem.querySelector('.experience-description').innerText = descriptionTextarea.value;

                                this.style.display = 'none';
                                experienceItem.querySelector('.edit-btn').style.display = 'inline';
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const experienceItem = this.closest('.experience-item');
                    const id = experienceItem.getAttribute('data-id');

                    fetch(`/delete-experience/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                experienceItem.remove();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>


</head>
<body>

<!-- Top Navbar -->
<nav class="navbar">
    <div class="container">
        <div class="nav-links">
            <a href="{{url('index.blade.php')}}">Home</a>
            <a href="#">My Network</a>
            <a href="{{url('job-listings.blade.php')}}">Jobs</a>
            <a href="{{url('Messaging')}}">Messaging</a>
            <a href="{{url('My%20Profile.blade.php')}}">Me</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>
    </div>
</nav>

<div class="main-container">
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <div class="profile-overview">
            <div class="profile-picture-container">
                <label for="profile-upload" class="profile-picture">
                    <img src="https://static.vecteezy.com/system/resources/previews/020/765/399/original/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg" alt="Profile Picture" id="profileImg">
                </label>
                <input type="file" id="profile-upload" style="display: none;" accept="image/*">
            </div>
            <div class="profile-info">
                <h1>Dr. Esraa Tamer</h1>
                <p class="title">Professor of Computer Science</p>
                <p class="location">Cairo, Egypt</p>
                <button class="connect-btn"><p>Connections: <strong>500+</strong></p></button>
                <button class="Followers-btn"><p>Followers: <strong>1200</strong></p></button>
            </div>
        </div>
    </aside>

    <!-- Main Profile Content -->
    <main class="profile-content">
        <!-- About Section -->
        <h2>About</h2>
        <p id="about-text">
            Enthusiastic Computer Science Professor with extensive experience in teaching and research.
            Passionate about educating the next generation of engineers and promoting technology.
        </p>

        <!-- Edit and Delete Buttons -->
        <button id="edit-btn" onclick="editAbout()">Edit</button>
        <button id="delete-btn" onclick="deleteAbout()">Delete</button>
        <button id="save-btn" style="display: none;" onclick="saveAbout()">Save</button>



        <h2>Experience</h2>

        <div id="experience-container">
            <div class="experience-item">
                <h3>Senior Developer at ABC Corp</h3>
                <p><span>Jan 2020 - Present</span> | Cairo, Egypt</p>
                <p>Leading the development of innovative software solutions.</p>
                <button onclick="editExperience()">Edit</button>
                <button onclick="deleteExperience()">Delete</button>
            </div>
            <div class="experience-item">
                <h3>Junior Developer at XYZ Inc.</h3>
                <p><span>Jan 2018 - Dec 2019</span> | Cairo, Egypt</p>
                <p>Assisted in the development and maintenance of web applications.</p>
                <button onclick="editExperience(this)">Edit</button>
                <button onclick="deleteExperience(this)">Delete</button>
            </div>
        </div>
        <button id="add-experience" onclick="addExperience()">Add Experience</button>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>


        <h2>Skills</h2>
        <ul class="skills-list">
            <li>JavaScript</li>
            <li>Python</li>
            <li>Django</li>
            <li>Java</li>
            <li>HTML & CSS</li>
            <li>Machine Learning</li>
        </ul>

        <h2>Education</h2>
        <div class="education-item">
            <h3>BSc in Computer Science</h3>
            <p><span>University of Cairo</span> | 2014 - 2018</p>
        </div>
        <div class="education-item">
            <h3>MSc in Computer Science</h3>
            <p><span>University of Cairo</span> | 2018 - 2020</p>
        </div>

        <!-- Activity Section -->


        <div class="activity-section">
            <h2>Activity</h2>
            <button class="create-post-btn" onclick="showPostForm()">Create a post</button>

            <div id="post-form" style="display: none;">
                <input type="text" id="post-title" placeholder="Enter post title">
                <textarea id="post-content" rows="4" placeholder="Write your post here..."></textarea>
                <button onclick="createPost()">Post</button>
            </div>

            <div class="posts-section">

                <h3>Posts</h3>
                <div id="posts-container">

                @foreach ($posts as $post)
                        <div class="post">
                            <div class="post-header">
                                <strong>{{ $post->user->name }}</strong> posted this • {{ $post->created_at->diffForHumans() }}
                            </div>
                            <p>{{ $post->content }}</p>
                            <div class="post-interactions">
                                <span onclick="likePost({{ $post->id }})">❤️ {{ $post->likes }}</span> |
                                <span onclick="showComments({{ $post->id }})">💬 {{ count($post->comments) }} comments</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
            </div>
        </div>
    </main>
</div>
</body>
</html>



