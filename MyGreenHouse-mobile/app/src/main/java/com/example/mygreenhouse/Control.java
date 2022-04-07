package com.example.mygreenhouse;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.drawerlayout.widget.DrawerLayout;

import com.google.android.material.navigation.NavigationView;
public class Control extends AppCompatActivity {
    DrawerLayout drawerLayout;
    NavigationView navigationView;
    Toolbar toolbar;
    Button btnLampe,btnVenti,btnIrrig,btnReser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_control);

        drawerLayout = findViewById(R.id.contol_drawer_layout);
        navigationView = findViewById(R.id.contol_nav_view);
        toolbar = findViewById(R.id.contol_toolbar);
        btnLampe = findViewById(R.id.cont_btn_lamp);
        btnVenti = findViewById(R.id.cont_btn_venti);
        btnIrrig = findViewById(R.id.cont_btn_irrig);
        btnReser = findViewById(R.id.cont_btn_reserv);


        setSupportActionBar(toolbar);

        btnLampe.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Control.this,LampeControle.class);
                startActivity(intent);
            }
        });
        btnVenti.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Control.this,VentilateurControle.class);
                startActivity(intent);
            }
        });
        btnIrrig.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Control.this,IrrigationControle.class);
                startActivity(intent);
            }
        });
        btnReser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Control.this,ReservoirControole.class);
                startActivity(intent);
            }
        });

        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this,drawerLayout,toolbar,R.string.navigation_drawer_open,R.string.navigation_drawer_close);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setCheckedItem(R.id.nav_control);
    }
}