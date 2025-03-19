<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Clinic Name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#doctors">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="{{ route('appointments.create') }}">Book Appointment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <section id="services">
            <h2>Our Services</h2>
            <p>We offer a wide range of medical services to meet your needs.</p>
        </section>

        <section id="doctors" class="mt-5">
            <h2>Meet Our Doctors</h2>
            <div class="row">
                <!-- Add doctor profiles here -->
            </div>
        </section>

        <section id="testimonials" class="mt-5">
            <h2>Patient Testimonials</h2>
            <div class="row">
                <!-- Add testimonials here -->
            </div>
        </section>

        <section id="contact" class="mt-5">
            <h2>Contact Us</h2>
            <p>Phone: +254 700 000 000</p>
            <p>Email: info@clinic.com</p>
            <p>Emergency: +254 700 000 001</p>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>