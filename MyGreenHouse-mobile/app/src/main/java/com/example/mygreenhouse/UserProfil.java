package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

import com.google.android.material.textfield.TextInputLayout;

public class UserProfil extends AppCompatActivity {
    TextInputLayout Name, Email, Phone, Password;
    TextView fullNameLabel, UsernameLabel, Function, GhName, GhNumber;
    Button btnUpdt;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_profil);

        //Hooks
        Name = findViewById(R.id.fullname_Profile);
        Email = findViewById(R.id.email_Profile);
        Phone = findViewById(R.id.phone_Profile);
        Password = findViewById(R.id.password_Profile);
        fullNameLabel = findViewById(R.id.fullname_fielde);
        UsernameLabel = findViewById(R.id.username_fielde);
        Function = findViewById(R.id.function);
        GhName = findViewById(R.id.greenHousename_Profile);
        GhNumber = findViewById(R.id.greenHousenumber_Profile);
        btnUpdt = findViewById(R.id.BtnUpdate_Profile);

        String ema=getIntent().getStringExtra("Email");
        String pass=getIntent().getStringExtra("Password");
        String ghname=getIntent().getStringExtra("GhName");
        String ghnumber=getIntent().getStringExtra("GhNumber");
        String function=getIntent().getStringExtra("Function");
        String fname=getIntent().getStringExtra("FullName");
        String phone=getIntent().getStringExtra("Phone");

        fullNameLabel.setText(fname);
        UsernameLabel.setText(ema);
        Function.setText(function);
        GhName.setText(ghname);
        GhNumber.setText(ghnumber);
        Name.getEditText().setText(fname);
        Email.getEditText().setText(ema);
        Phone.getEditText().setText(phone);
        Password.getEditText().setText(pass);

    }

}