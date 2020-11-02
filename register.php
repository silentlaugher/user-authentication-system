<?php
    $page_title = "Edynak User Authentication System - Register Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
    include_once 'includes/classes/Database.php';
?>
<div class="registerContainer">
    <div class="column">
        <div class="header">
         <!--site logo goes here -->
        <h3>Sign Up</h3>
        <span>to continue to site</span>        
        </div>
        <div class="registerForm">
            <form action="register.php" method="POST">
            <div class="name">
				<h5>Name</h5>
                <input type="text" name="first_name"  class="form-control" placeholder="First Name" value="" required>
				<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="" required>																	
  		  		 </div>
                <br>
				<div>
				<h5>Username</h5>
				<input type="text" name="username" class="form-control" placeholder="Username" value="" required>
				</div>
                <br>
				<div>
				<h5>Email</h5>
				<input type="email" name="email" class="form-control" placeholder="Email" value="" required>
				</div>
                <br>
				<div>
				<h5>Password</h5>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
				<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
				</div>
				<br>
				<div>
				<fieldset>
					<legend>Gender</legend>
					<input id="male" type="hidden" name="gender" value="">
					<input id="male" type="radio" name="gender" value="male">
					<label for="male">
						Male
					</label>
					<input id="female" type="radio" name="gender" value="female">
					<label for="female">
						Female
					</label>
                    <input id="idrathernotsay" type="radio" name="gender" value="idrathernotsay">
                    <label for="idrathernotsay">
						I'd rather not say
					</label> 
				</fieldset>
                <hr>
				<fieldset class="date">
				  <legend>Date of Birth</legend>
				  <label for="month">Month</label>
				  <select id="month_start"
				          name="month" />
  				    <option  value="" selected>Month</option>    
				    <option value="1">January</option>      
				    <option value="2">February</option>      
				    <option value="3">March</option>      
				    <option value="4">April</option>      
				    <option value="5">May</opcenter>      
				    <option value="6">June</option>      
				    <option value="7">July</option>      
				    <option value="8">August</option>      
				    <option value="9">September</option>      
				    <option value="10">October</option>      
				    <option value="11">November</option>      
				    <option value="12">December</option>      
				  </select> -
				  <label for="day_start">Day</label>
				  <select id="day_start"
				          name="day" />
  				    <option  value="" selected>Day</option>    
				    <option>1</option>      
				    <option>2</option>      
				    <option>3</option>      
				    <option>4</option>      
				    <option>5</option>      
				    <option>6</option>      
				    <option>7</option>      
				    <option>8</option>      
				    <option>9</option>      
				    <option>10</option>      
				    <option>11</option>      
				    <option>12</option>      
				    <option>13</option>      
				    <option>14</option>      
				    <option>15</option>      
				    <option>16</option>      
				    <option>17</option>      
				    <option>18</option>      
				    <option>19</option>      
				    <option>20</option>      
				    <option>21</option>      
				    <option>22</option>      
				    <option>23</option>      
				    <option>24</option>      
				    <option>25</option>      
				    <option>26</option>      
				    <option>27</option>      
				    <option>28</option>      
				    <option>29</option>      
				    <option>30</option>      
				    <option>31</option>      
				  </select> -
				  <label for="year_start">Year</label>
				  <select id="year_start"
				         name="year" />
 				    <option  value="" selected>Year</option>    
				    <option>1980</option>      
				    <option>1981</option>      
				    <option>1982</option>      
				    <option>1983</option>      
				    <option>1984</option>      
				    <option>1985</option>      
				    <option>1986</option>      
				    <option>1987</option>      
				    <option>1988</option>      
				    <option>1989</option>     
				    <option>1990</option>      
				    <option>1991</option>      
				    <option>1992</option>      
				    <option>1993</option>      
				    <option>1994</option>      
				    <option>1995</option>      
				    <option>1996</option>      
				    <option>1997</option>      
				    <option>1998</option>      
				    <option>1999</option>
				    <option>2000</option>      
				    <option>2001</option>      
				    <option>2002</option>      
				    <option>2003</option>      
				    <option>2004</option>      
				    <option>2005</option>      
				    <option>2006</option>      
				    <option>2007</option>      
				    <option>2008</option>      
				    <option>2009</option>      
				  </select>
				  <span class="inst">(Month-Day-Year)</span>
				</fieldset>
                </div>
                <hr>
				<div class="btn-div">
                    <input type="button" class="btn btn-danger float-left" onclick="window.location.href='index.php';" value="Back" /> 
                    <button type="submit" name="registerBtn" class="btn btn-primary float-right">Register</button>
 				</div>
            </form>
            <br><br>
        </div>
        <p class="loginMessage float-left">Already have an account?<a href="login.php"> Sign in</a></p>
    </div>
</div>