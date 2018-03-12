import requests

clientId = input_data['clientID']
projectId = input_data['projectID']
# alternatively, if clientId and projectId are not passed in as input, they can be hardcoded like this:
# clientId = '123'
# projectId = '456'

url = 'https://app.lassocrm.com/registrants'

headers = {'X-Lasso-Auth': 'Token=' + input_data['LassoUID'] + ', Version=1.0'}
# alternatively, if  the auth token is not passed in as input, it can be hardcoded like this:
# headers = {'X-Lasso-Auth': 'Token=fgxb2rq, Version=1.0'}

json = {
    'firstName': input_data['firstName'], 
    'lastName': input_data['lastName'],
    'clientId': clientId,
    'projectIds': [projectId],
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
    'addresses': [
        {
            'address': input_data['address'],
            'city': input_data['city'],
            'country': input_data['country'],
            'province': input_data['province'],
            'postalCode': input_data['postalCode'],
            'type': input_data['addressType'],
            'primary': True
        }
    ],
    'notes': [
        input_data['note']
    ],
    'questions': [
        {
            'path': 'Marketing',
            'name': 'What magazines/newspapers do you like to read?',
            'answers': [
                {
                    'text': 'Lasso Daily'
                }
            ]
        },
        {
            'id': '34120',
            'answers': [
                {
                    'id': '160302'
                },
                {
                    'id': '160303'
                }
            ]
        }
    ],
    'nameTitle': input_data['nameTitle'],
    'company': input_data['company'],
    'rating': 'N',
    'sourceType': 'Online Registration',
    'secondarySourceType': 'Facebook',
    'followUpProcess': '30-day follow up',
    'contactPreference': 'Any',
    'sendSalesRepAssignmentNotification': True,
    'thankYouEmailTemplateId': '155'
}

r = requests.post(url, json=json, headers=headers)

output = [{'status': r.status_code, 'reason': r.reason}]