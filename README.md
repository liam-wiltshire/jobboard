# JobBoard

## Overview
Really this is a little internal project for my kids - we have a little jobboard at home where we can post jobs that need doing and assign a 'wage' for doing them. The kids then have a login each and can claim a job, do the job, then mark it for review.

Once the job is reviewed/accepted then the 'wage' goes straight into their online account, which they can use to buy tablet time, and then we pay out any balance at the end of the month (that happens manually)

So yeah, not really a public project, but if anyon wants to re-use it, feel free!

## Deployment
Good luck! Not really built as an OS project, although in theory you should just need to checkout the code and run composer install

## Notes
 - Yes, it should use middleware for checking the user type
 - Yes, there isn't validation against job IDs that the specified ID actually blongs to the logged in user - I trust my kids not to try to break each other's accounts :-)
 - Yes, there are probably 1,001 other issues with it, but I hacked it together in 4 hours, so it's *very* pre-alpha, but we've been running it at home for a few days and so far it's doing the job!
