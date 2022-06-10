<div class="container">



    <div class="mt-3">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8666137371006!2d-118.34572409652633!3d34.10103588663408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2zNzA2MCBIb2xseXdvb2QgQmx2ZCwgTG9zIEFuZ2VsZXMsIENBIDkwMDI4LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1654228132747!5m2!1sru!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <p class="mt-3 text-center fw-bold">To participate in the conference, please fill out the form</p>



    <form class="bg-dark text-success mt-3 p-5 rounded-5" id="regForm" action="store-participant" method="POST" enctype="multipart/form-data">
        <!--step one-->
        <div class="tab">
            <div class="mb-3">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control required" id="firstName" name="fname">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control required" id="lastName" name="lname">
            </div>
            <div class="date mb-3" data-provide="datepicker">
                <label for="birhtday" class="form-label">Birhtday</label>
                <div class="input-group">
                    <input type="date" class="form-control required" name="birhtday" id="birhtday">
                </div>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-select required" aria-label="Default select example" name="country">
                    <?php
                    foreach ($countries as $country) : ?>
                        <option value="<?= $country->id ?>"><?= $country->countryName ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Enter your phone number:</label>
                <input type="tel" class="form-control required" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <small>Format: 123-456-7890</small>
            </div>
            <div class="mb-3">
                <label for="reportSubject" class="form-label">Report subject</label>
                <input type="text" class="form-control required" id="reportSubject" name="reportSubject">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control required" id="email" name="email" aria-describedby="emailHelp" autocomplete="off">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                <small>Format: string@mail.com</small>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" class="btn btn-primary m-2" id="prevBtn" onclick="nextPrev(this, -1)">Previous</button>
                    <button type="button" class="btn btn-primary m-2" id="nextBtn" onclick="nextPrev(this, 1)">Next</button>
                </div>
            </div>

        </div>

        <!--step two-->
        <div class="tab">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position">
            </div>
            <div class="mb-3">
                <label for="about">About me:</label>
                <textarea class="mb-3" id="about" name="about" rows="10" cols="105">

                </textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Your photo</label>
                <input type="file" class="form-control" id="fileId" name="filename">
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" class="btn btn-primary m-2" id="prevBtn" onclick="nextPrev(this, -1)">Previous</button>
                    <button type="button" class="btn btn-primary m-2" id="nextBtn" onclick="nextPrev(this, 1)">Next</button>
                </div>
            </div>

        </div>

        <!--step three-->
        <div class="tab share">
            <p id="share">Share</p><br>
            <a href="/participants">All members</a><br>
            <a href="http://twitter.com/share?text=<?php echo TW_TEXT ?>&url=<?php echo APP_URL . '/participant/' ?>" onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false" target="_parent" id="share_tw">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                    <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" fill="blue" />
                </svg>

            </a>




            <a href="https://www.facebook.com/sharer/sharer.php?t=<?php echo TW_TEXT ?>&u=<?php echo urlencode(APP_URL . '/participant/')?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook" id="share_fb">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                    <path class="fbIcon" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" fill="blue" />
                </svg>
            </a>
        </div>
    </form>



    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>

</div>