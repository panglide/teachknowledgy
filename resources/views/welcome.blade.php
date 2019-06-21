<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teachknowledgy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>

        html, body {
          height: 100vh;
          font-family: 'Exo', sans-serif;
          margin: 0px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .flex-bottom {
            align-items: center;
            display: flex;
            justify-content: flex-end;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            color: #FA6C00;
            font-weight: 500;
        }

        .links > a {
            color: #ff9a4d;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;

        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .parallax {
          /* The image used */
          background-image: url('teachknowledgy.jpg');

          /* Full height */
          height: 100vh;

          /* Create the parallax scrolling effect */
          background-attachment: fixed;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          }


          .tagline {
              font-size: 40px;
              color: #FA6C00;
              font-weight: 300;
          }

          @media screen and (max-width: 799px){
            .title {
              font-size: 45px;
              font-weight: 400;
            }
            .tagline {
                font-size: 30px;
                color: #FA6C00;
                font-weight: 300;
            }
            .flex-bottom {
                align-items: baseline;
                display: flex;
                justify-content: center;

            }
          }
          h4 {
            color: #FA6C00;
            font-size: 20px;
            font-weight: bold;
          }




        </style>
    </head>

    <body>
      <div class="parallax full-height flex-center">
        <div class="content">
          <div class="title">Teachknowledgy</div>
          <div class="links">
            <a href="{{url('login')}}">Login</a>
            <a href="{{url('register')}}">Register</a>
            <a href="{{url('lessons/demo')}}">Demo</a>
          </div>

        </div>

      </div>


      <div style="padding: 25px; height:auto;background-color:#CCCECD;font-size:16px">
        <h1 style="text-align: center;">About Teachknowledgy</h1>
        <h4>What is it?</h4>
        <p>Teachknowledgy is an administrative assitant for classroom teachers.  It is meant to serve as a simple and powerful data management tool for the classroom
           teacher who devotes countless hours to the chore of collecting and reporting data instead of interacting with students or preparing for tomorrow's lesson.
        </p>
        <blockquote>
          "I think data is an important part of teaching effectively in the 21st century.  However, the data I have to collect and report is rarely returned
          in any meaningful way.  The data does not inform my daily instruction because it is meaningless or weeks old by the time I get to see it.
          Data ends up negatively impacting my instruction because the time spent managing data replaces time that could be spent on highly impactful
          interaction with my kids."
        </blockquote>
        <br/>
        <h4>What does it do?</h4>
        <p>
          This web based application acts as a layer of software that sits between the teacher and the students, the teacher and the administrators, the teacher
          and the grade book.  It attempts to autonmously collect meaningful data, generate meaningful reports, and track classroom progress toward
          proficiency related to state and district learning standards in real time.  The data input is programmatically performed by the system and the
          classroom teacher is free to give 100% of their attention to the students. <div class="links"><a href="{{url('demo')}}">Click for a demo!</a></div>
        </p>
        <br/>
        <h4>What Teachknowledgy doesn't do.</h4>
        <p>Teachknowledgy will not replace the myriad of data reporting systems every classroom teacher is burdened with.  You will still need to maintain
          your required attendance records, gradebook, RTI reporting, or other data.  Your school, district, and state will
        have its own (probably serveral) systems it requires you to use and you will still have to use those.
        Fortunately, the majority of these systems will allow you to upload an exported data set in the form of CSV files.  Teachknowledgy will take the place
        of your spreadsheet related tasks, inlcuding exporting the data in an interchangeable format that you can then upload into your
        required system(s).  Teachknowledgy will do this for you, meaning you enter the data once and then upload it once the report is generated and exported.
        </p>
        <br/>
        <h4>Why do I need it?</h4>
        <p>
          Teachknowledgy is designed on the model of the teacher's assistant.  What if you could have someone in your classroom EVERYDAY that would grade your papers,
          enter those grades into your grade book, plan your lessons, develop your assessments, and fluidly and dynamcially group and regroup your students
          according to proficiency?  Would you "need" them?  Then you need Teachknowledgy because that is EXACTLY what we are building.
        </p>
      </div>

      <div class="parallax full-height flex-bottom">
        <div class="content">
          <div class="tagline">Focus on what is important!</div>
          <div style=" margin-top: 5px;" class="links">
            <a style="background: #fff1e6; border-radius: 10%; padding: 8px;" href="{{url('register')}}">Register Now</a>
          </div>

        </div>

      </div>

    </body>
</html>
