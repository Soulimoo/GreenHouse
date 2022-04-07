package com.example.mygreenhouse;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.navigation.NavigationView;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class Dashbord extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {
    //Variables
    DrawerLayout drawerLayout;
    NavigationView navigationView;
    Toolbar toolbar;
    Button btnGraph, btnControl, btnProfil, btnContactus, btnAbout;
    TextView email;
    ProgressDialog progressDialog;
    ConnectionClass connectionClass;

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashbord);

        //Hooks
        drawerLayout = findViewById(R.id.drawer_layout);
        navigationView = findViewById(R.id.nav_view);
        toolbar = findViewById(R.id.toolbar);
        btnGraph = findViewById(R.id.dash_btn_graph);
        btnControl = findViewById(R.id.dash_btn_conrole);
        btnProfil = findViewById(R.id.dash_btn_profil);
        btnContactus = findViewById(R.id.dash_btn_Contactus);
        btnAbout = findViewById(R.id.dash_btn_about);
        email = findViewById(R.id.ema_log);

        String ema=getIntent().getStringExtra("Email");

        email.setText(ema);

        connectionClass = new ConnectionClass();

        progressDialog=new ProgressDialog(this);

        //Tool Bar
        setSupportActionBar(toolbar);

        btnGraph.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashbord.this,Graph.class);
                startActivity(intent);
            }
        });
        btnControl.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashbord.this,Control.class);
                startActivity(intent);
            }
        });
        btnProfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Dologin dologin=new Dologin();
                dologin.execute("");
                //Intent intent = new Intent(Dashbord.this,UserProfil.class);
                //startActivity(intent);
            }
        });
        btnContactus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashbord.this,ContactUs.class);
                startActivity(intent);
            }
        });
        btnAbout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Dashbord.this,About.class);
                startActivity(intent);
            }
        });



        //Navigation Drawer Menu
        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this,drawerLayout,toolbar,R.string.navigation_drawer_open,R.string.navigation_drawer_close);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setNavigationItemSelectedListener(this);
        navigationView.setCheckedItem(R.id.nav_home);
    }

    @Override
    public void onBackPressed() {
        if (drawerLayout.isDrawerOpen(GravityCompat.START)){
            drawerLayout.closeDrawer(GravityCompat.START);
        }else{
            super.onBackPressed();
        }
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {

        switch (menuItem.getItemId()){
            case R.id.nav_home:
                break;
            case R.id.nav_graph:
                Intent intent1 = new Intent(Dashbord.this,Graph.class);
                startActivity(intent1);
                break;
            case R.id.nav_profil:
                Dologin dologin=new Dologin();
                dologin.execute("");
                //Intent intent2 = new Intent(Dashbord.this,UserProfil.class);
                //startActivity(intent2);
                break;
            case R.id.nav_contactus:
                Intent intent3 = new Intent(Dashbord.this,ContactUs.class);
                startActivity(intent3);
                break;
            case R.id.nav_about:
                Intent intent4 = new Intent(Dashbord.this,About.class);
                startActivity(intent4);
                break;
            case R.id.nav_logout:
                Intent intent5 = new Intent(Dashbord.this,Login.class);
                startActivity(intent5);
                break;
        }

        drawerLayout.closeDrawer(GravityCompat.START);

        return true;
    }

    private class Dologin extends AsyncTask<String,String,String> {

        String logEmail =email.getText().toString();
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

                try {
                    Connection con = connectionClass.CONN();
                    if (con == null) {
                        z = "Please check your internet connection";
                    } else {

                        String query=" select * from android where Email='"+ logEmail +"'";


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

                            if(em.equals(logEmail)) {
                                isSuccess=true;
                                z = "Profil build successfully";
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
            return z;
        }

        @Override
        protected void onPostExecute(String s) {
            Toast.makeText(getBaseContext(),""+z,Toast.LENGTH_LONG).show();
            if(isSuccess) {
                Intent intent = new Intent(Dashbord.this,UserProfil.class);

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