<!-- Sidebar Holder -->
<nav class="sidebar-nav">
    <div class="sidebar-header">
        <h4>New Lucena Crime Profiling System</h4>
    </div>

    <ul class="list-unstyled components">
        <p>Records</p>
        <li {{Request::segment(1) == "crimecommitted" ? "class=active" : ""}}>
            <a href="{{ route('crimecommitted.index') }}">Crime Committed</a>
        </li>
        <li {{Request::segment(1) == "suspects" ? "class=active" : ""}}>
            <a href="{{ route('suspects.index') }}">Suspects</a>
        </li>
        <li {{Request::segment(1) == "crimetype" ? "class=active" : ""}}>
            <a href="{{ route('crimetype.index') }}">Crime Types</a>
        </li>
        <li {{Request::segment(1) == "officers" ? "class=active" : ""}}>
            <a href="{{ route('officers.index') }}">Officers</a>
        </li>
        <li {{Request::segment(1) == "investigators" ? "class=active" : ""}}>
            <a href="{{ route('investigators.index') }}">Investigators</a>
        </li>
        {{-- <li> gonna leave this as sample i might use later
            <a href="#">About</a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages <span class="caret"></span></a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </li> --}}
    </ul>

    {{-- <ul class="list-unstyled CTAs"> might use this in the future
         <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
        <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
    </ul> --}}
</nav>