// $(document).ready(function(){
  // validate add form on keyup and submit
  $("#bankForm").validate({
    rules: {
      name: "required",
      address: {
        required: true,
        minlength: 2,
        maxlength: 50
      },
      phone: {
        required: true,
        digits: true,
        rangelength : [8, 20]
      },
      email: {
        email: true
      },
      contact_person_no : {
        digits: true,
        rangelength : [8, 20]
      }

    },
    messages: {
      name: "The name field is required.",
      address: {
        required: "The address field is required.",
        minlength: "The address must be at least 2 characters.",
        maxlength: "The address must not be more than 50 characters."
      },
      phone: {
        required: "The phone field is required.",
        digits: "The phone must be digits.",
        rangelength: "The phone must be between 8 and 20 digits."
      },
      email: "The email must be a valid email address.",
      contact_person_no: {
        digits: "The contact person no must be digits.",
        rangelength: "The contact person no must be between 8 and 20 digits."
      },
    }
  });

  $("#branchForm").validate({
    rules: {
      address: {
        required: true,
        minlength: 2,
        maxlength: 50
      },
      phone: {
        required: true,
        digits: true,
        rangelength : [8, 20]
      },
      email: {
        email: true
      },
      contact_person_no : {
        digits: true,
        rangelength : [8, 20]
      }

    },
    messages: {
      address: {
        required: "The address field is required.",
        minlength: "The address must be at least 2 characters.",
        maxlength: "The address must not be more than 50 characters."
      },
      phone: {
        required: "The phone field is required.",
        digits: "The phone must be digits.",
        rangelength: "The phone must be between 8 and 20 digits."
      },
      email: "The email must be a valid email address.",
      contact_person_no: {
        digits: "The contact person no must be digits.",
        rangelength: "The contact person no must be between 8 and 20 digits."
      },
    }
  });

  $("#brokerForm").validate({
    rules: {
      name: "required",
      address: {
        required: true,
        minlength: 2,
        maxlength: 50
      },
      phone: {
        required: true,
        digits: true,
        rangelength : [8, 20]
      },
      email: {
        email: true
      },
      contact_person_no : {
        digits: true,
        rangelength : [8, 20]
      },
      broker_no : "required"
    },
    messages: {
      name: "The name field is required.",
      address: {
        required: "The address field is required.",
        minlength: "The address must be at least 2 characters.",
        maxlength: "The address must not be more than 50 characters."
      },
      phone: {
        required: "The phone field is required.",
        digits: "The phone must be digits.",
        rangelength: "The phone must be between 8 and 20 digits."
      },
      email: "The email must be a valid email address.",
      contact_person_no: {
        digits: "The contact person no must be digits.",
        rangelength: "The contact person no must be between 8 and 20 digits."
      },
      broker_no: "The broker number field is required."
    }
  });

  $("#rtaForm").validate({
    rules: {
      name: "required",
      phone: {
        required: true,
        digits: true,
        rangelength : [8, 20]
      },
      email: {
        email: true
      },
      contact_person_no : {
        digits: true,
        rangelength : [8, 20]
      }

    },
    messages: {
      name: "The name field is required.",
      phone: {
        required: "The phone field is required.",
        digits: "The phone must be digits.",
        rangelength: "The phone must be between 8 and 20 digits."
      },
      email: "The email must be a valid email address.",
      contact_person_no: {
        digits: "The contact person no must be digits.",
        rangelength: "The contact person no must be between 8 and 20 digits."
      },
    }
  });

  $("#dpForm").validate({
    rules: {
      name: "required",
      address: {
        required: true,
        minlength: 2,
        maxlength: 50
      },
      phone: {
        required: true,
        digits: true,
        rangelength : [8, 20]
      },
      email: {
        email: true
      },
      dp_id : {
        digits: true,
        rangelength : [8, 8]
      }

    },
    messages: {
      name: "The name field is required.",
      address: {
        required: "The address field is required.",
        minlength: "The address must be at least 2 characters.",
        maxlength: "The address must not be more than 50 characters."
      },
      phone: {
        required: "The phone field is required.",
        digits: "The phone must be digits.",
        rangelength: "The phone must be between 8 and 20 digits."
      },
      email: "The email must be a valid email address.",
      dp_id: {
        digits: "The DP Id must be digits.",
        rangelength: "The DP Id must be 8 digits."
      },
    }
  });

  $("#companyForm").validate({
    rules: {
      company_name: "required",
      company_type_id: {
        required: true,
        digits: true
      },
      company_ticker: "required",
      rta_id: {
        required: true,
        digits: true
      },
    },
    messages: {
      company_name: "The name field is required.",
      company_type_id: {
        required: "Please select company type.",
        digits: "Please select company type."
      },
      company_ticker: "The company ticker field is required.",
      rta_id: {
        required: "Please select RTA.",
        digits: "Please select RTA."
      },
    }
  });

  $("#companytypeForm").validate({
    rules: {
      type: "required"
    },
    messages: {
      type: "The name field is required."
    }
  });

  $("#packageForm").validate({
    rules: {
      name: "required",
      primary_price: {
        required: true,
        number: true,
        min: 0.01
      },
      secondary_price: {
        required: true,
        number: true,
        min: 0.01
      }

    },
    messages: {
      name: "The name field is required.",
      primary_price: {
        required: "The primary price field is required.",
        number: "The primary price must be number.",
        min: "The primary price must be positive."
      },
      secondary_price: {
        required: "The secondary price field is required.",
        number: "The secondary price must be number.",
        min: "The secondary price must be positive."
      }
    }
  });

  $("#servicePackageForm").validate({
    rules: {
      service_name: "required"
    },
    messages: {
      service_name: "The name field is required."
    }
  });

// });