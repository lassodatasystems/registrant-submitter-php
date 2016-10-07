import requests

clientId = input_data['clientID']
projectId = input_data['projectID']

url = 'https://api.lassocrm.com/registrants'
headers = {'X-Lasso-Auth': 'Token=' + input_data['LassoUID'] + ', Version=1.0'}
json = {
    'firstName': input_data['firstName'], 
    'lastName': input_data['lastName'], 
    'clientId': input_data['clientID'], 
    'projectIds': [input_data['projectID']], 
    'emails': [
        {
            'email': input_data['email'],
            'type': input_data['emailType'],
            'primary': True
        }
    ],
    'phones': [
        {
            'phone': input_data['phone'],
            'type': input_data['phoneType'],
            'primary': True
        }
    ],
    'notes': [
        input_data['note']
    ],
    'rating': 'N',
    'sourceType': 'Online Registration',
    'contactPreference': 'Any',
    'sendSalesRepAssignmentNotification': True
}

r = requests.post(url, json=json, headers=headers)

output = [{'status': r.status_code, 'reason': r.reason}]