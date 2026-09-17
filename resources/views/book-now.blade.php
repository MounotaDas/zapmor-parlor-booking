<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zapmor - Book Appointment</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6ff;
            color: #10182f;
        }

        /* NAVBAR */

        .navbar {
            height: 90px;
            background: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 12%;

            border-bottom: 1px solid #eeeeee;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;

            background: linear-gradient(
                90deg,
                #286eff,
                #c127e8
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #596179;
            font-size: 16px;
            font-weight: 600;
        }

        .login-btn {
            border: 1.5px solid #2875ff;
            padding: 10px 20px;
            border-radius: 30px;
            color: #1768dc !important;
        }

        .app-btn {
            background: linear-gradient(
                90deg,
                #2277ff,
                #c125e8
            );

            color: white !important;

            padding: 12px 21px;

            border-radius: 30px;
        }


        /* BOOKING SECTION */

        .booking-section {
            min-height: calc(100vh - 90px);

            padding: 35px 20px 60px;

            text-align: center;

            background: #f5f6ff;
        }

        .subtitle {
            color: #c126e8;

            font-size: 13px;

            font-weight: 700;

            letter-spacing: 1px;

            margin-bottom: 12px;
        }

        h1 {
            font-size: 42px;

            color: #101b3c;

            margin-bottom: 45px;
        }


        /* BOOKING CARD */

        .booking-card {
            width: 780px;

            max-width: 95%;

            margin: auto;

            background: white;

            padding: 45px;

            border-radius: 28px;

            text-align: left;

            box-shadow:
                0 15px 45px rgba(42, 57, 120, 0.10);
        }


        /* FORM */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 24px;
        }

        .form-group {
            width: 100%;
        }

        label {
            display: block;

            font-size: 15px;

            font-weight: 600;

            margin-bottom: 9px;
        }

        label span {
            color: #111;
        }

        input,
        select,
        textarea {
            width: 100%;

            border: 1px solid #dfe4ef;

            border-radius: 12px;

            padding: 13px 14px;

            font-size: 15px;

            outline: none;

            background: white;
        }

        input,
        select {
            height: 48px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4285ff;
        }

        small {
            display: block;

            margin-top: 8px;

            color: #667085;

            font-size: 13px;
        }

        select:disabled {
            background: #e9edf3;

            color: #4d5566;

            cursor: not-allowed;
        }

        .notes {
            margin-top: 25px;
        }

        textarea {
            min-height: 95px;

            resize: vertical;
        }


        /* BUTTON */

        .confirm-btn {
            width: 100%;

            height: 52px;

            margin-top: 25px;

            border: none;

            border-radius: 13px;

            background: linear-gradient(
                90deg,
                #1677ff,
                #c126e8
            );

            color: white;

            font-size: 17px;

            font-weight: 700;

            cursor: pointer;
        }


        /* MOBILE */

        @media (max-width: 700px) {

            .navbar {
                height: auto;
                padding: 20px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .booking-card {
                padding: 25px 20px;
            }

            h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="logo">
            Zapmor
        </div>

        <div class="nav-links">

            <a href="#">Home</a>

            <a href="#">Services ▼</a>

            <a href="#">Book Now</a>

            <a href="#">About</a>

            <a href="#">Contact</a>

            <a href="#" class="login-btn">
                Login
            </a>

            <a href="#" class="app-btn">
                ▶ Get App
            </a>

        </div>

    </nav>


    <!-- BOOKING SECTION -->

    <section class="booking-section">

        <div class="subtitle">
            RESERVE YOUR SLOT
        </div>

        <h1>
            Book your appointment
        </h1>


        <div class="booking-card">
            @if(session('success'))
    <div style="background:#d1fae5; color:#065f46; padding:15px; border-radius:10px; margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="background:#fee2e2; color:#991b1b; padding:15px; border-radius:10px; margin-bottom:20px;">
        <ul style="margin:0; padding-left:20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="POST" action="{{ route('booking.store') }}">
        @csrf

                <div class="form-grid">

                    <!-- FULL NAME -->

                    <div class="form-group" style="position: relative;">

    <label>
        Full Name <span>*</span>
    </label>

    <input
        type="text"
        id="customerName"
        name="customer_name"
        autocomplete="off"
        placeholder="Search your name"
        required
    >

    <div id="customerSuggestions"
         style="
            position: absolute;
            top: 78px;
            left: 0;
            width: 100%;
            background: white;
            border: 1px solid #dfe4ef;
            border-radius: 10px;
            display: none;
            z-index: 1000;
            max-height: 180px;
            overflow-y: auto;
         ">
    </div>

    <small>
        Search your name if you have booked before.
    </small>

</div>

                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>
                            Email <span>*</span>
                        </label>

                        <input
    type="email"
    id="customerEmail"
    name="email"
    placeholder="Your email"
    required
>

                    </div>


                    <!-- SERVICE TYPE -->

                    <div class="form-group">

                        <label>
                            Service Type <span>*</span>
                        </label>

                        <select id="serviceType" name="service_type" required>

                            <option value="">
                                Select...
                            </option>

                            <option value="doctor">
                                Doctor
                            </option>

                            <option value="parlor">
                                Parlor
                            </option>

                        </select>

                    </div>


                    <!-- SPECIFIC SERVICE -->

                    <div class="form-group">

                        <label>
                            Specific Service <span>*</span>
                        </label>

                        <select id="specificService" name="service_id" required>
    <option value="">Select a service</option>

    @foreach($services as $service)
        <option value="{{ $service->service_id }}">
            {{ $service->service_name }}
        </option>
    @endforeach
</select>

                    </div>


                    <!-- PROVIDER -->

                    <div class="form-group">

                        <label>
                            Preferred Provider
                        </label>

                         <select name="parlor_id">
    <option value="">Any Available</option>

    @foreach($parlors as $parlor)
        <option value="{{ $parlor->parlor_id }}">
            {{ $parlor->name }}
        </option>
    @endforeach
</select>

                    </div>


                    <!-- DATE -->

                    <div class="form-group">

                        <label>
                            Date & Time <span>*</span>
                        </label>

                        <input type="datetime-local" name="appointment_datetime" required>

                    </div>

                </div>


                <!-- NOTES -->

                <div class="form-group notes">

                    <label>
                        Additional Notes
                    </label>

                    <textarea name="note"></textarea>

                </div>


                <!-- BUTTON -->

                <button type="submit" class="confirm-btn">
                    Confirm Booking
                </button>

            </form>

        </div>

    </section>


    <!-- JAVASCRIPT -->
    <script>
    const customerName = document.getElementById('customerName');
    const customerEmail = document.getElementById('customerEmail');
    const customerSuggestions = document.getElementById('customerSuggestions');

    customerName.addEventListener('input', function () {

        const search = this.value.trim();

        if (search.length < 2) {
            customerSuggestions.style.display = 'none';
            customerSuggestions.innerHTML = '';
            return;
        }

        fetch("{{ route('customer.search') }}?search=" + encodeURIComponent(search))
            .then(response => response.json())
            .then(customers => {

                customerSuggestions.innerHTML = '';

                if (customers.length === 0) {
                    customerSuggestions.style.display = 'none';
                    return;
                }

                customers.forEach(customer => {

                    const item = document.createElement('div');

                    item.style.padding = '12px 14px';
                    item.style.cursor = 'pointer';
                    item.style.borderBottom = '1px solid #eeeeee';

                    item.innerHTML = `
                        <strong>${customer.customer_name}</strong><br>
                        <small>${customer.email}</small>
                    `;

                    item.addEventListener('click', function () {

                        customerName.value = customer.customer_name;
                        customerEmail.value = customer.email;

                        customerSuggestions.style.display = 'none';
                    });

                    customerSuggestions.appendChild(item);
                });

                customerSuggestions.style.display = 'block';
            })
            .catch(error => {
                console.error('Customer search error:', error);
            });
    });

    document.addEventListener('click', function (event) {

        if (!customerName.contains(event.target) &&
            !customerSuggestions.contains(event.target)) {

            customerSuggestions.style.display = 'none';
        }
    });
</script>

    

</body>
</html>