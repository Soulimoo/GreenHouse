package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ActivityOptions;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Pair;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.textfield.TextInputLayout;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class Login extends AppCompatActivity {
    Button callSignUp, login_btn;
    ImageView image;
    TextView logoText, slogantext;
    TextInputLayout email, Password;

    ProgressDialog progressDialog;
    ConnectionClass connectionClass;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_login);

        //Hooks
        callSignUp = findViewById(R.id.SingUp_screen);
        image = findViewById(R.id.logoimage);
        logoText = findViewById(R.id.logo_name);
        slogantext = findViewById(R.id.slogan_name);
        email = findViewById(R.id.email);
        Password = findViewById(R.id.password);
        login_btn = findViewById(R.id.login);

        connectionClass = new ConnectionClass();

        progressDialog=new ProgressDialog(this);

        callSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Login.this, SingUp.class);

                startActivity(intent);
            }
        });
        login_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Dologin dologin=new Dologin();
                dologin.execute("");
              //Intent intent = new Intent(Login.this,Dashbord.class);
              //startActivity(intent);
            }
        });
    }

    private Boolean validateEmail() {
        String val = email.getEditText().getText().toString();
        if (val.isEmpty()) {
            email.setError("Field cannot be empty");
            return false;
        } else {
            email.setError(null);
            email.setErrorEnabled(false);
            return true;
        }
    }

    private Boolean validatePassword() {
        String val = Password.getEditText().getText().toString();
        if (val.isEmpty()) {
            Password.setError("Field cannot be empty");
            return false;
        } else {
            Password.setError(null);
            Password.setErrorEnabled(false);
            return true;
        }
    }

    public void userLogin(View view) {

    }

    public void userReg(View view) {
        startActivity(new Intent(this,SingUp.class));

    }


    private class Dologin extends AsyncTask<String,String,String> {

        String logEmail =email.getEditText().getText().toString();
        String logPassword =Password.getEditText().getText().toString();
        String z="";
        boolean isSuccess=false;

        String em,password,ghname,ghnumber,function,fname,phone;


        @Override
        protected void onPreExecute() {


            progressDialog.setMessage("Loading...");
            progressDialog.show();


            super.onPreExecute();
        }

        @Override
        protected String doInBackground(String... params) {
            if(logEmail.trim().equals("") || logPassword.trim().equals(""))
                z = "Please enter all fields....";
            else {
                try {
                    Connection con = connectionClass.CONN();
                    if (con == null) {
                        z = "Please check your internet connection";
                    } else {

                        String query=" select * from android where Email='"+ logEmail +"' and Password = '"+ logPassword +"'";


                        Statement stmt = con.createStatement();
                        // stmt.executeUpdate(query);


                        ResultSet rs=stmt.executeQuery(query);

                        while (rs.next()) {
                            em=rs.getString(1);
                            password=rs.getString(2);
                            ghname=rs.getString(3);
                            ghnumber=rs.getString(4);
                            function=rs.getString(5);
                            fname=rs.getString(6);
                            phone=rs.getString(7);

                            if(em.equals(logEmail)&&password.equals(logPassword)) {
                                isSuccess=true;
                                z = "Login successfull";
                            }
                            else
                                isSuccess=false;
                        }
                    }
                }
                catch (Exception ex) {
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
                Intent intent = new Intent(Login.this,Dashbord.class);

                intent.putExtra("Email",em);
                intent.putExtra("Password",password);
                intent.putExtra("GhName",ghname);
                intent.putExtra("GhNumber",ghnumber);
                intent.putExtra("Function",function);
                intent.putExtra("FullName",fname);
                intent.putExtra("Phone",phone);

                startActivity(intent);
            }
            progressDialog.hide();
        }
    }
}