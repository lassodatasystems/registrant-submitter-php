# Registering via cUrl using PHP

### Using PHP

Once you have checked out the repo you will need to update the following in [signup.php](../master/signup.php) to test a submission

- clientId
- projectId
- apiKey

After updating those fields try submitting [signup.html](../master/signup.html)

#### My registration is not in Lasso?

If you don't see your submission in lasso try looking at the error console in your browser.
More information about the request can be found by uncommenting the lines at the bottom of [signup.php](../master/signup.php)
and re-trying your submission.

### NOT using PHP

take a look at [lead.json](../master/lead.json), it is an example of the json body you will need to submit.

note that in your POST request you will need to include a custom header

X-Lasso-Auth: Token={apiKey},Version=1.0

Once you have your json formatted submit your leads to https://api.lassocrm.com/registrants

### Response Codes

Code|What does that mean?
----|----
201|Your registrant was created in Lasso, Success
302|There is an issue with security, double check the X-Lasso-Auth header

## Faceboook to Zapier integration with Python script

1. Create an action using the **Code** app
![Step 1](../master/resources/1-zapier.png)

2. Select **Run Python**
![Step 2](../master/resources/2-zapier.png)

3. Edit Template and fill in data variables as shown
**Note:** LassoUID, projectID, and clientID are obtainable from Project Admin -> View Registration Code
![Step 3](../master/resources/3-zapier.png)

4. Alternative way of filling in data variables from preset facebook data variables
![Step 4](../master/resources/4-zapier.png)

5. Place contents of [registrant-submitter-zapier.py](../master/src/registrant-submitter-zapier.py) into the **Code** section
![Step 5](../master/resources/5-zapier.png)
