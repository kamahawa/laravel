<html>
<body>
<ul id="dropdown">
    <li>
        <a href="<?php echo base_url();?>homepage">Home Busmanage</a>
        <a href="<?php echo base_url();?>login/logout" style="float: right; margin-right: 10px">LogOut</a>
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