# Registering via cUrl using PHP

### Using PHP

Once you have checked out the repo you will need to update the following in signup.php to test a submission

- clientId
- projectId
- apiKey

After updating those fields try submitting [signup.html](../master/signup.html)

#### My registration is not in Lasso?

If you don't see your submission in lasso try looking at the error console in your browser
you can get more information by uncommenting the lines at the bottom of [signup.php](../master/signup.php)
and re-trying your submission.

### NOT using PHP

take a look at [lead.json](../master/lead.json), it is an example of the json body you will need to submit.

note that in your POST request you will need to include a custom header

X-Lasso-Auth: Token={apiKey},Version=1.0
