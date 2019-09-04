#%% [markdown]
# # This file is for running tests against our MFDZ CRUD app REST API. 
# The test are implemented as notebook cells for the sake of ease of use.

#%% [markdown]
# First we need to make sure we have the necessary packages and import them.
#%% 
!conda install -y requests 

#%% 
import requests, json, difflib

#%% [markdown]
# Below we define some global variables that we will use throughout the tests.
# It is also used to define the attributes of rides, searches, etc.
# 
#%% 
baseurl="http://localhost:8080/api/"

#%% [markodwn]
# Attriubtes of a ride object
# id: id: --> int
# owner: the owner of the object --> final will  be the id of the user that owns it
# from: self-explanatory
# to: self-explanatory
# recurring: shows if this is a one time or a recurring / repeating offer.
#   --> [int]
#   Definition:
#       [0] --> not recurring, thus one-time offer, If zero is not the first element it is then ignored.
#       [<int between 1-6>] --> indicates the nth day(s) of week the ride occurs.
#       if zero is the first element then x>0 elements are ignored and ride is treated as one-time ride.
#           First day of the week is Monday.
#           Examples:
#               [1,2,4] --> ride occurs every Monday, Tuesday, and Thursday
#               [1,2,3,4,5] --> ride happens every Mon, Tue, Wed, Thu, and Fri
#               [0, 2, 4] --> 2nd and 3rd element ignored, treated as one time ride
#               [1, 3, 0] --> 0 is ignored, ride happens on every Mon, Wed. 
# timeestamp: --> long, unix like timestamp
#   Definition: for one-time trips the exact time and date the ride happens,
#               for recurring trips only the time (hour, minute) part is used
#               and the date will be inferred from the recurring attribute.
#%%
ride1={"id": 1, "owner": "mfdz", "from": "Musberg", "to": "Stuttgart",
    "recurring": [0], "timestamp": 123456}

ride2={"id": 2, "owner": "mfdz", "from": "Stuttgart", "to": "Musberg",
    "recurring": , "timestamp": 654321}
rides={"rides":[ride1, ride2]}
testResponse1=json.dumps(rides)
testResponse1