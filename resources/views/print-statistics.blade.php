<style>
    table.stat, table.stat th, table.stat td {
        border: solid #000 1px;
    }
    table.stat th, table.stat td{
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
<style>
    body{
        font-family: "Arial";
    }
    div.document-header{
        text-align: center;
        margin-bottom: 40px;
    }
    div.sidenote{
        font-size:12px;
        margin-bottom: 20px;
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
<div class="report-wrapper">
    <div class="document-header">
        <span style="font-size: 30px;">Police National Police</span>
    </div>

    <div class="sidenote">
        NEW LUCENA MPS, ILOILO PPO, PRO 6<br>
        CRIME STATISTICS<br>
        Jan 01, 2019 - Dec 31,2019<br>
        Printed: {{Carbon\Carbon::now()->format('M d, Y h:i A')}}
    </div>
	<table class="stat">
        <tr>
            <th>NATURE OF THE CRIME</th>
            <th>Total Cases</th>
            <th>Total Crimes Cleared</th>
            <th>Total Crimes Solved</th>
            <th>Total Crimes On Trial</th>
            {{-- <th>Late Reported</th>
            <th>Total Crimes Cleared</th>
            <th>Total Crimes Solved</th>
            <th>TOTAL (date committed + late report)</th> --}}
        </tr>
        @foreach(\App\CrimeType::all() as $crime)
        <tr>
            <td>{{$crime->crime_type}}</td>
            <td>{{count($crime->cases)}}</td>
            <td>{{count($crime->cleared())}}</td>
            <td>{{count($crime->solved())}}</td>
            <td>{{count($crime->ontrial())}}</td>
         {{--    <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td> --}}
        </tr>
        @endforeach
    </table>
	
</div>