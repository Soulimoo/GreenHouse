package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.os.Bundle;

import com.github.mikephil.charting.charts.PieChart;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;
import com.github.mikephil.charting.data.PieEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class ReservoirChart extends AppCompatActivity {
    ConnectionClass connectionClass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reservoir_chart);

        connectionClass = new ConnectionClass();

        PieChart pieChart = findViewById(R.id.pieChart);
        ArrayList<PieEntry> visitors = new ArrayList<>();

        try {
            Connection con = connectionClass.CONN();
            if (con == null) {
            } else {

                String query = " select ID, sum(reservoireau) as reservoireau, sum(reservoirgaz) as reservoirgaz from datasets ";


                Statement stmt = con.createStatement();
                // stmt.executeUpdate(query);


                ResultSet rs = stmt.executeQuery(query);

                while (rs.next()) {
                    visitors.add(new PieEntry(rs.getInt("reservoireau"),"ReservoirEau"));
                    visitors.add(new PieEntry(rs.getInt("reservoirgaz"),"ReservoirGaz"));
                }
                PieDataSet pieDataSet = new PieDataSet(visitors,"Etat_De_Reservoir");
                pieDataSet.setColors(ColorTemplate.JOYFUL_COLORS);
                pieDataSet.setValueTextColor(Color.BLACK);
                pieDataSet.setValueTextSize(16f);

                PieData pieData = new PieData(pieDataSet);

                pieChart.setData(pieData);
                pieChart.getDescription().setEnabled(false);
                pieChart.setCenterText("Etat_De_Reservoir");
                pieChart.animate();

            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}