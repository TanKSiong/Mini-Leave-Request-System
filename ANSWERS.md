# ANSWERS.md

## S1. Overtime Claims Module

### Database

* `overtime_claims` table:

  * id
  * user_id
  * overtime_date
  * start_time
  * end_time
  * total_hours
  * reason
  * status (pending/approved/rejected)
  * approved_by
  * timestamps

### Backend

* API/routes:

  * submit claim
  * list claims
  * approve/reject claim
  * view single claim
* Validation for dates and hours
* Business logic for approval workflow

### Frontend

* Staff pages:

  * submit overtime form
  * claim history
* Manager pages:

  * pending approvals list
  * approve/reject actions
* Status badges and notifications

### Permissions

* Staff can create/view own claims
* Managers can approve/reject team claims
* Admin can view all records

---

## S2. Leave Request Still Showing Pending

1. Check whether the database record actually updated:

   * verify status column in MySQL/phpMyAdmin

2. Check backend update logic:

   * controller/service may not call `save()` or `update()`

3. Check API response and frontend refresh:

   * frontend may reload cached data or wrong endpoint

4. Check model/database field names:

   * possible mismatch like `status` vs `leave_status`
   * mass assignment/fillable issue in Laravel model

---

## S3. .env File With Real API Key Leaked

1. Immediately inform the senior/team lead privately and confirm exposure.

2. Revoke and rotate the API key:

   * generate a new key
   * disable old compromised key

3. Remove `.env` from repo:

   * delete committed file
   * add `.env` to `.gitignore`

4. Remove secrets from git history if required:

   * use git filter-repo/BFG
   * force push cleaned history

5. Check logs/usage for abuse during exposure period.

6. Document the incident and improve process:

   * secret scanning
   * pre-commit checks
   * use environment secret managers instead of committing keys.
