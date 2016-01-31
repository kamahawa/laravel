<html>
    <title>Home Page</title>
    <meta charset="utf-8"/>
    <head>
        <style type="text/css">
            #dropdown {
                margin-top: 16px;
                width: 1830px
            }
            #dropdown li{
                list-style:none;
                line-height: 30px;
                background: blue;
                margin: 2px;
            }
            #dropdown li div a{
                margin-left: 150px;
                color: #FFF;
                text-decoration: none;
            }
 
            #dropdown li a{
                margin-left: 10px;
                color: #FFF;
                text-decoration: none;
            }
            .colbox 
            {
                margin-left: 0px;
                margin-right: 0px;
            }
        </style>
    </head>
    <body>
    <ul id="dropdown">
            <li>
                <a href="#">Home Busmanage</a>
                <a href="<?php echo base_url();?>login/logout" style="float: right; margin-right: 10px;" >LogOut</a> 
                <a style="float: right;margin-right: 20px;">Wellcom <?php echo $_SESSION['UserName']; ?>,</a>
            </li>
            <li>
                <div>
                    <a href="<?php echo base_url();?>user">User</a>
                    <a href="<?php echo base_url();?>vehicle">Vehicle</a>
                    <a href="<?php echo base_url();?>student">Student</a>
                    <a href="<?php echo base_url();?>group">System Group</a>
                    <a href="<?php echo base_url();?>point">System Point</a>
                    <a href="<?php echo base_url();?>route">System Route</a>
                    <a href="<?php echo base_url();?>location">Location</a>
                    <a href="<?php echo base_url();?>absent">Pick Up</a>
                </div>
            </li>
        </ul>
    </body>
</html>
