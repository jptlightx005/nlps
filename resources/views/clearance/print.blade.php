<style>
    div.document-header{
        text-align: center;
    }
    h2.title{
        text-align: center;
    }
</style>

<div class="document-header">
    Republic of the Philippines<br>
    National Police Commission<br>
    <b>PHILIPPINE NATIONAL POLICE</b><br>
    <b>ILOILO POLICE PROVINCIAL OFFICE</b><br>
    <b>NEW LUCENA MUNICIPAL POLICE STATION</b><br>
    New Lucena, Iloilo
</div>

<div>NLMPSA</div>
<div>Control No. {{$clearance->control_number}}</div>

<h2 class="title">P O L I C E &nbsp;C L E A R A N C E</h2>

<label>Name: <b>{{$clearance->fullName()}}</b></label><br>
<label>Address: <b>{{$clearance->address}}</b></label><br>
<label>Nationality: <b>{{$clearance->nationality}}</b></label><br>
<label>Purpose: <b>{{$clearance->purpose}}</b></label>
