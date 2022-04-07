package com.example.mygreenhouse;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.drawerlayout.widget.DrawerLayout;

import android.content.Intent;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.view.View;
import android.widget.Button;

import com.google.android.material.navigation.NavigationView;

public class Graph extends AppCompatActivity {
    DrawerLayout drawerLayout;
    NavigationView navigationView;
    Toolbar toolbar;
    Button btnAtms, btnConso, btnHumid, btnResrv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_graph);

        drawerLayout = findViewById(R.id.graph_drawer_layout);
        navigationView = findViewById(R.id.graph_nav_view);
        toolbar = findViewById(R.id.graph_toolbar);
        btnAtms = findViewById(R.id.Atmosphere);
        btnConso = findViewById(R.id.Consomation);
        btnHumid = findViewById(R.id.Humidite);
        btnResrv = findViewById(R.id.Reservoir);

        //Tool Bar
        setSupportActionBar(toolbar);

        btnAtms.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Graph.this,AtmosphereChart.class);
                startActivity(intent);
            }
        });
        btnConso.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Graph.this,ConsomationChart.class);
                startActivity(intent);
            }
        });
        btnHumid.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Graph.this, HumiditeChart.class);
                startActivity(intent);
            }
        });
        btnResrv.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Graph.this,ReservoirChart.class);
                startActivity(intent);
            }
        });

        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this,drawerLayout,toolbar,R.string.navigation_drawer_open,R.string.navigation_drawer_close);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setCheckedItem(R.id.nav_graph);
    }
}