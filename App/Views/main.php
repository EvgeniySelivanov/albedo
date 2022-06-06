<?php require_once 'App/Helpers/Messages.php';
session_start();
showMessage();

?>
<div class="container">
    <div class="mt-3">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8666137371006!2d-118.34572409652633!3d34.10103588663408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2zNzA2MCBIb2xseXdvb2QgQmx2ZCwgTG9zIEFuZ2VsZXMsIENBIDkwMDI4LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1654228132747!5m2!1sru!2sua"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <p class="mt-3 text-center fw-bold">To participate in the conference, please fill out the form</p>

    <form class="bg-dark text-success mt-3 p-5 rounded-5" id="regForm" action="/store-participatn" method="POST" enctype="multipart/form-data">
        <!-- One "tab" for each step in the form: -->

        <!--step one-->
        <div class="tab">
            <div class="mb-3">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control required"  id="firstName" oninput="this.className = ''" name="fname" >
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control required" id="lastName" oninput="this.className = ''" name="lname" >
            </div>
            <div class="date mb-3" data-provide="datepicker">
                <label for="birhtday" class="form-label">Birhtday</label>
                <div class="input-group">
                    <input type="date" class="form-control required" name="birhtday" id="birhtday" oninput="this.className = ''" >
                    <!-- <span class="input-group-addon ms-2"><i class="fas fa-calendar"></i></span> -->
                </div>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-select required" aria-label="Default select example" name="country" oninput="this.className = ''" >
                    <option selected>Choose a country</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Enter your phone number:</label>
                <input type="tel" class="form-control required" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" oninput="this.className = ''"
                    >
                    <small>Format: 123-456-7890</small>
            </div>
            <div class="mb-3">
                <label for="reportSubject" class="form-label">Report subject</label>
                <input type="text" class="form-control required" id="reportSubject" name="reportSubject" oninput="this.className = ''" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" aria-describedby="emailHelp"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" oninput="this.className = ''" >
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                <small>Format: string@mail.com</small>
            </div>
        </div>
        <!--step two-->
        <div class="tab">
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" oninput="this.className = ''">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" oninput="this.className = ''">
            </div>
            <div class="mb-3">
                <label for="about">About me:</label>
                <textarea id="about" name="about" rows="10" cols="105" oninput="this.className = ''">
                
                </textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Your photo</label>
                <input type="file" class="form-control"  id="fileId" name="filename"  oninput="this.className = ''">
            </div>

        </div>
        <!--  <button type="submit" class="btn btn-primary">Next</button> -->

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" class="btn btn-primary m-2" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn btn-primary m-2" id="nextBtn"  onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
           
        </div>
    </form>