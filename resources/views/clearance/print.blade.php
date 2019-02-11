<style>
    body{
        font-family: "Arial";
    }
    div.document-header{
        text-align: center;
    }
    h2.title{
        text-align: center;
    }

    div.line-container{
        display:block;
    }
    div.block-label{
        display: inline-block;
        margin-right: 25px;
    }
    .line-container label{
        margin-right: 25px;
    }
    .image-container{
        position: absolute;
        top: 176px;
        right: 20px;
    }

    .image-container img{
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    div.document-header{
        position: relative;
        top:0;
        left:0;
    }
    img.header-logo.left{
        position: absolute;
        top: 0;
        left:150px;
    }
    img.header-logo.right{
        position: absolute;
        top: 0;
        right:150px;
    }
    div.wrapper{
        height: 100%;
        background-image: url('/res/photos/map-assets/new-lucena-pnp-logo-bnw.jpg');
        background-repeat:no-repeat;
        background-size: auto 75%;
        background-position: 100px;
        padding-top: 3%;
        padding-bottom: 3%;


    }

    div.content{
        margin-top:100px;
    }

    div.content p{
        margin-left:50px;
    }

    p.bottom-clear{
        margin-bottom: 0px;
    }
    p.top-clear{
        margin-top:0px;
    }

    p.bigger{
        font-size:20px; 
        text-decoration: underline;
    }
    div.signable{
        display: inline;
        margin-right: 200px;
    }
</style>

<div class="document-header">
    <img class="header-logo left" src="/res/photos/map-assets/new-lucena-pnp-logo.jpg">
    Republic of the Philippines<br>
    National Police Commission<br>
    <b>PHILIPPINE NATIONAL POLICE</b><br>
    <b>ILOILO POLICE PROVINCIAL OFFICE</b><br>
    <b>NEW LUCENA MUNICIPAL POLICE STATION</b><br>
    New Lucena, Iloilo
    <img class="header-logo right" src="/res/photos/map-assets/new-lucena-logo.jpg">
</div>

<div class="wrapper">
    <div>NLMPSA</div>
    <div>Control No. {{$clearance->control_number}}</div>

    <h2 class="title">P O L I C E &nbsp;C L E A R A N C E</h2>
    <div class="line-container">
        <label>Name: <b>{{$clearance->fullName()}}</b></label>
        <label>Date of Birth: <b>{{optional($clearance->date_of_birth)->format('F d, Y')}}</b></label>
    </div>
    <div class="line-container">
        <label>Address: <b>{{$clearance->address}}</b></label>
        <label>Place of Birth: <b>{{$clearance->place_of_birth}}</b></label>
    </div>
    <div class="line-container">
        <label>Nationality: <b>{{$clearance->nationality}}</b></label>
        <label>Age: <b>{{$clearance->age()}}</b></label>
        <label>Gender: <b>{{$clearance->gender}}</b></label>
        <label>Civil Status: <b>{{$clearance->civil_status}}</b></label>
    </div>
    <div class="line-container">
        <div class="block-label">
            <label>Purpose:</label>
            <br><b>{{$clearance->purpose}}</b>
        </div>
        <div class="block-label">
            <label>Res. Cert. No:</label>
            <br><b>{{$clearance->cert_no ?? '&nbsp;'}}</b>
        </div>
        <div class="block-label">
            <label>Date Issued:</label>
            <br><b>{{$clearance->date_issued->format('m/d/Y')}}</b>
        </div>
        <div class="block-label">
            <label>Place Issued:</label>
            <br><b>{{$clearance->place_issued}}</b>
        </div>
    </div>
    <div class="image-container">
        <b>{{$clearance->date_issued->format('F d, Y')}}</b><br>
        <img src="{{$clearance->image_url}}" />
    </div>

    <div class="content">
        <b>TO WHOM IT MAY CONCERN:</b>
        <br>
        <p>This is to certify that the person whose name, picture and thumb prints appear hereon has requested a RECORD CLEARANCE from this office and the result(s) is/are listed below:</p>
        <p class="bottom-clear bigger">NO DEROGATORY RECORDS</p>
        <p class="top-clear">VALID FOR THREE (3) MONTHS</p>

        <div class="signable">
            <p class="bottom-clear"><b>Agar S Octaviano</b></p>
            <p class="bottom-clear top-clear">Police Officer 2</p>
            <p class="bottom-clear top-clear">Investigator</p>
        </div>

        <div class="signable">
            <p class="bottom-clear"><b>FELIX DC ALIANZA JR</b></p>
            <p class="bottom-clear top-clear">Police Senior Inspector</p>
            <p class="bottom-clear top-clear">Acting Chief of Policec</p>
        </div>

    </div>
</div>
