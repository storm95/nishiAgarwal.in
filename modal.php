<!-- Login-Signup Modal -->
<div id="Login-SignupModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login/Sign up</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<h4><span>Login</span></h4>
						<form method="get" action="loginSignup.php">
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" name=<?php echo '"'.$colEmailId.'"' ?> class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" name=<?php echo '"'.$colPassword.'"' ?> class="form-control" id="pwd">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
							<a href=""  data-toggle="modal" data-target="#forgotChangePwdModal"><span>Fogot password?</span></a>
							<input name=<?php echo '"'.$colLoginSignup.'"' ?> class="display-hidden" value="1">
						</form>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 left-vertical-line">
						<h4><span>Sign Up(If you donot have an account)</span></h4>
						<form method="get" action="loginSignup.php">
							<div class="form-group">
								<label for="UserName">Name:</label>
								<input type="UserName" name=<?php echo '"'.$colFullName.'"' ?> class="form-control" id="UserName">
							</div>
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" name=<?php echo '"'.$colEmailId.'"' ?> class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" name=<?php echo '"'.$colPassword.'"' ?> class="form-control" id="pwd">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
							<input name=<?php echo '"'.$colLoginSignup.'"' ?> class="display-hidden" value="0">
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!-- forgotChangePwdModal -->
<div id="forgotChangePwdModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Fogot/Change Password</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<h4><span>We’ll send you an email to reset your password.</span></h4>
						<form method="get" action=<?php echo '"'.$forgotChangePwdPhp.'"' ?> >
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" name=<?php echo '"'.$colEmailId.'"' ?> class="form-control" id="email">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
							<input name=<?php echo '"'.$sendPwdVerifyCode.'"' ?> class="display-hidden" value="1">
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!-- msgModal -->
<div id="msgModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Notice !</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<h4><span><?php echo $getMsgVal; ?></span></h4>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>