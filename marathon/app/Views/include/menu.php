<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li

            <?php
            if(isset($index)){
                echo "class='active'";
            }
            ?>
        >
            <a href="/marathon/public/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li
            <?php
            if(isset($manage_marathon)){
                echo "class='active'";
            }
            ?>
        >
            <a href="/marathon/public/marathon"><i class="fa fa-fw fa-bar-chart-o"></i> Manage Marathons</a>
        </li>
        <li
            <?php
            if(isset($add_marathon)){
                echo "class='active'";
            }
            ?>
        >
            <a href="/marathon/public/add"><i class="fa fa-fw fa-table"></i> Add Marathon</a>
        </li>
        <li
            <?php
            if(isset($manage_runners)){
                echo "class='active'";
            }
            ?>
        >
            <a href="/marathon/public/runners"><i class="fa fa-fw fa-edit"></i> Manage Runners</a>
        </li>
        <li
            <?php
            if(isset($registration_form)){
                echo "class='active'";
            }
            ?>
        >
            <a href="/marathon/public/registration"><i class="fa fa-fw fa-desktop"></i> Registration Form</a>
        </li>
    </ul>
</div>