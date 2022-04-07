package com.example.mygreenhouse;

import android.graphics.Color;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class AtmosphereChart extends AppCompatActivity {
    ConnectionClass connectionClass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_atmosphere_chart);
        connectionClass = new ConnectionClass();
        ArrayList<BarEntry> visitors = new ArrayList<>();
        BarChart barChart = findViewById(R.id.barchart);

        try {
            Connection con = connectionClass.CONN();
            if (con == null) {
            } else {

                String query = " select ID, tempirature from datasets ";


                Statement stmt = con.createStatement();
                // stmt.executeUpdate(query);


                ResultSet rs = stmt.executeQuery(query);

                while (rs.next()) {
                    visitors.add(new BarEntry(rs.getInt("ID"), rs.getInt("tempirature")));
                }

                BarDataSet barDataSet = new BarDataSet(visitors, "tempirature");
                barDataSet.setColors(ColorTemplate.MATERIAL_COLORS);
                barDataSet.setValueTextColor(Color.BLACK);
                barDataSet.setValueTextSize(16f);

                BarData barData = new BarData(barDataSet);

                barChart.setFitBars(true);
                barChart.setData(barData);
                barChart.getDescription().setText("Atmosphere de la serre tempirature");
                barChart.animateY(2000);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}