<!-- Sidebar Holder -->
<nav class="sidebar-nav">
    <div class="sidebar-header">
        <h4>New Lucena Crime Profiling System</h4>
    </div>

    <ul class="list-unstyled components">
        <li {{Request::segment(1) == "blotterreports" ? "class=active" : ""}}>
    <a href="{{ route('blotterreports.index') }}">Blotter Reports</a>
        </li>
        <li {{Request::segment(1) == "suspects" ? "class=active" : ""}}>
            <a href="{{ route('suspects.index') }}">Suspects Profile</a>
        </li>
        <li {{Request::segment(1) == "crimecommitted" ? "class=active" : ""}}>
            <a href="{{ route('crimecommitted.index') }}">Cases</a>
        </li>
        <li {{Request::segment(1) == "policeclearance" ? "class=active" : ""}}>
            <a href="{{ route('policeclearance.index') }}">Police Clearance</a>
        </li>
    </ul>

    {{-- <ul class="list-unstyled CTAs"> might use this in the future
         <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
        <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
    </ul> --}}
</nav>