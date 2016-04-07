<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 10px;
                width: 100%;
                /*display: table;*/
                /*font-weight: 100;*/
                /*font-family: 'Lato';*/
            }

            .container {
                /*text-align: center;*/
                /*display: table-cell;*/
                vertical-align: middle;
            }

            p{
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                text-align: justify;
                padding: 20px;

            }
            .content {
                /*text-align: center;*/
                /*display: inline-block;*/
            }

            .title {
                font-family: 'Lato',Helvetica, Arial, sans-serif;
                font-weight: 100;
                font-size: 60px;
            }
        </style>

        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">The Event System Demo</div>

                <h2>Task</h2>
                <p>Create a simple web form using PHP that allows a user to sign up for an event.</p>
                <ul>
                    <li>The form should include fields for:
                        <ul>
                            <li>first name</li>
                            <li>last name</li>
                            <li>phone number</li>
                            <li>email address</li>
                            <li>an acceptance of Terms & Conditions</li>
                        </ul>
                    </li>
                    <li>All fields are required except for the phone number.</li>
                    <li>Upon the user’s submission of the form, the data should be saved to a MySQL database.</li>
                    <li>After saving, if the email address has registered for any other events, those events should be displayed.</li>
                    <li>The events are to be broken up into two lists, previous events and future events.</li>
                    <li>Whether the email address has been used or not, there should also be a list of all upcoming events.</li>
                    <li>The event lists should include the event name and date, both pulled from the database.</li>
                </ul>

                <h2>Notes</h2>
                <p>Database integrity and security are important. There also should not be any PHP errors, warnings, or notices. The page should exhibit basic responsive behavior.</p>

                <h2>Include</h2>
                <ul>
                    <li>All Code.</li>
                    <li>Any special information needed for displaying the page.</li>
                    <li>An export of the database structure and data.</li>
                </ul>

                <div class="text-center">
                    <a class="btn btn-lg btn-primary" href="event">See the Solution</a>
                </div>
            </div>
        </div>
    </body>
</html>
