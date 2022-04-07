package com.example.mygreenhouse;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.textfield.TextInputLayout;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class SingUp extends AppCompatActivity {

    TextInputLayout regGreenHouseName, regRegGreenHouseNumber, regGreenHouseFunction, regName, regEmail, regPhone, regPassword;
    Button regBtn, reLogin;
    ConnectionClass connectionClass;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_sing_up);

        //Hooks
        regGreenHouseName = findViewById(R.id.regGreenHouseName);
        regRegGreenHouseNumber = findViewById(R.id.regGreenHouseNumber);
        regGreenHouseFunction = findViewById(R.id.regGreenHouseFunction);
        regName = findViewById(R.id.regName);
        regEmail = findViewById(R.id.regEmail);
        regPhone = findViewById(R.id.regPhone);
        regPassword = findViewById(R.id.regPassword);
        regBtn = findViewById(R.id.regbtn);
        reLogin = findViewById(R.id.regToLogin);

        connectionClass = new ConnectionClass();

        progressDialog=new ProgressDialog(this);

        regBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Doregister doregister = new Doregister();
                doregister.execute("");
            }

        });

    }

    private Boolean validateGreenHouseName() {
        String val = regGreenHouseName.getEditText().getText().toString();
        if (val.isEmpty()) {
            regGreenHouseName.setError("Field cannot be empty");
            return false;
        } else {
            regGreenHouseName.setError(null);
            regGreenHouseName.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validateGreenHouseNumber() {
        String val = regRegGreenHouseNumber.getEditText().getText().toString();
        if (val.isEmpty()) {
            regRegGreenHouseNumber.setError("Field cannot be empty");
            return false;
        } else if (val.length() >= 2) {
            regRegGreenHouseNumber.setError("A lot of GreenHouse chose less than 10 ");
            return false;
        } else {
            regRegGreenHouseNumber.setError(null);
            regRegGreenHouseNumber.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validateFunction() {
        String val = regGreenHouseFunction.getEditText().getText().toString();
        if (val.isEmpty()) {
            regGreenHouseFunction.setError("Field cannot be empty");
            return false;
        } else {
            regGreenHouseFunction.setError(null);
            regGreenHouseFunction.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validateName() {
        String val = regName.getEditText().getText().toString();
        if (val.isEmpty()) {
            regName.setError("Field cannot be empty");
            return false;
        } else {
            regName.setError(null);
            regName.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validateEmail() {
        String val = regEmail.getEditText().getText().toString();
        String emailPattern = "[a-zA-Z0-9._-]+@[a-z]+\\.+[a-z]+";

        if (val.isEmpty()) {
            regEmail.setError("Field cannot be empty");
            return false;
        } else if (!val.matches(emailPattern)) {
            regEmail.setError("Invalid email address");
            return false;
        } else {
            regEmail.setError(null);
            regEmail.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validatePhone() {
        String val = regPhone.getEditText().getText().toString();

        if (val.isEmpty()) {
            regPhone.setError("Field cannot be empty");
            return false;
        } else {
            regPhone.setError(null);
            regPhone.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validatepassword() {
        String val = regPassword.getEditText().getText().toString();
        String passwordVal = "^" +
                //"(?=.*[0-9])" +         //at least 1 digit
                //"(?=.*[a-z])" +         //at least 1 lower case letter
                //"(?=.*[A-Z])" +         //at least 1 upper case letter
                "(?=.*[a-zA-Z])" +      //any letter
                "(?=.*[@#$%^&+=])" +    //at least 1 special character
                "(?=\\S+$)" +           //no white spaces
                ".{4,}" +               //at least 4 characters
                "$";

        if (val.isEmpty()) {
            regPassword.setError("Field cannot be empty");
            return false;
        } else if (!val.matches(passwordVal)) {
            regPassword.setError("Password is too weak");
            return false;
        } else {
            regPassword.setError(null);
            regPassword.setErrorEnabled(false);
            return true;
        }
    }


    public class Doregister extends AsyncTask<String,String,String>
    {


        String singGhName = regGreenHouseName.getEditText().getText().toString();
        String singGhNumber = regRegGreenHouseNumber.getEditText().getText().toString();
        String singFunction = regGreenHouseFunction.getEditText().getText().toString();
        String singFullName = regName.getEditText().getText().toString();
        String singEmail = regEmail.getEditText().getText().toString();
        String singPhone = regPhone.getEditText().getText().toString();
        String singPassword = regPassword.getEditText().getText().toString();
        String z="";
        boolean isSuccess=false;

        @Override
        protected void onPreExecute() {
            progressDialog.setMessage("Loading...");
            progressDialog.show();
        }

        @Override
        protected String doInBackground(String... params) {

            if(singGhName.trim().equals("")|| singGhNumber.trim().equals("") || singFunction.trim().equals("")|| singFullName.trim().equals("")|| singEmail.trim().equals("") || singPhone.trim().equals("")|| singPassword.trim().equals(""))

                z = "Please enter all fields....";
            else
            {
                try {
                    Connection con = connectionClass.CONN();
                    if (con == null) {
                        z = "Please check your internet connection";
                    } else {

                        String query="insert into android values('"+singEmail+"','"+singPassword+"','"+singGhName+"','"+singGhNumber+"','"+singFunction+"','"+singFullName+"','"+singPhone+"')";

                        Statement stmt = con.createStatement();
                        stmt.executeUpdate(query);

                        z = "Register successfull";
                        isSuccess=true;


                    }
                }
                catch (Exception ex)
                {
                    isSuccess = false;
                    z = "Exceptions"+ex;
                }
            }
            return z;
        }

        @Override
        protected void onPostExecute(String s) {

            Toast.makeText(getBaseContext(),""+z,Toast.LENGTH_LONG).show();


            if(isSuccess) {
                startActivity(new Intent(SingUp.this,Login.class));
            }


            progressDialog.hide();
        }
    }

}