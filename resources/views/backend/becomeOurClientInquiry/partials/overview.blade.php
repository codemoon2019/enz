<div class="col">
	<strong>Personal Details</strong>
    <hr/>
    <div class="form-group">
        <strong>Firstname : </strong> {{ $model->first_name }}
    </div>
    <div class="form-group">
        <strong>Lastname : </strong> {{ $model->last_name }}
    </div>
    <div class="form-group">
        <strong>Middlename : </strong> {{ $model->middle_name }}
    </div>
    <div class="form-group">
        <strong>Date of Birth : </strong> {{ $model->date_of_birth }}
    </div>
    <div class="form-group">
        <strong>Country Birth : </strong> {{ $model->country_birth }}
    </div>
    <div class="form-group">
        <strong>Passport Number : </strong> {{ $model->passport_number }}
    </div>
    <div class="form-group">
        <strong>Citizenship : </strong> {{ $model->citizenship }}
    </div>
    <div class="form-group">
        <strong>Civil Status : </strong> {{ $model->civil_status }}
    </div>
    <div class="form-group">
        <strong>Gender : </strong> {{ $model->gender }}
    </div>
    <div class="form-group">
        <strong>Expiry Date : </strong> {{ $model->expiry_date }}
    </div>
    <br>
	<strong>Contact Details</strong>
    <hr/>
    <div class="form-group">
        <strong>Street Number : </strong> {{ $model->street_number }}
    </div>
    <div class="form-group">
        <strong>Street Name : </strong> {{ $model->street_name }}
    </div>
    <div class="form-group">
        <strong>Town/City : </strong> {{ $model->town }}
    </div>
    <div class="form-group">
        <strong>Province : </strong> {{ $model->province }}
    </div>
    <div class="form-group">
        <strong>ZIP Code : </strong> {{ $model->zip_code }}
    </div>
    <div class="form-group">
        <strong>Email : </strong> {{ $model->email }}
    </div>
    <div class="form-group">
        <strong>Mobile Number : </strong> {{ $model->mobile_number }}
    </div>
    <div class="form-group">
        <strong>Telephone Number : </strong> {{ $model->telephone_number }}
    </div>
</div>