<?php include('includes/header.php'); ?>
<?php include('includes/top_nav.php'); ?>

    <div class="main">
    <?php include('includes/side_nav.php'); ?>

        <div class="container">
            <h1>Dashboard</h1>
        <div class="details">
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-eye"></i>
                </div>
            <div>
                <span class="card-name">View</span>
                <br>
                <span class="numbers">12,738</span>
            </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-users"></i>
                </div>
            <div>
                <span class="card-name">Teachers</span>
                <br>
                <span class="numbers">128</span>
            </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-book"></i>
                </div>
            <div>
                <span class="card-name">Books</span>
                <br>
                <span class="numbers">1238</span>
            </div>
            </div>
            <div class="card">
                <div class="iconbx">
                    <i class="fas fa-clock"></i>
                </div>
            <div>
                <span class="card-name">Date</span>
                <br>
                <span class="numbers">12/12/2021</span>
            </div>
            </div>
        </div>
        <div class="content">
            <div class="recents">
                <span>Recents Posts</span>
                <table id="table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010/10/14</td>
                            <td>$327,900</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
</div>

<?php include('includes/footer.php'); ?>