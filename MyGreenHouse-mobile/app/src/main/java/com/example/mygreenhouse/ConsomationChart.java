package com.example.mygreenhouse;

import android.graphics.Color;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.charts.PieChart;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;
import com.github.mikephil.charting.data.PieEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import static com.github.mikephil.charting.utils.ColorTemplate.*;

public class ConsomationChart extends AppCompatActivity {
    ConnectionClass connectionClass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_consomation_chart);
        connectionClass = new ConnectionClass();

        PieChart pieChart = findViewById(R.id.ahmed);
        ArrayList<PieEntry> visitors = new ArrayList<>();

        try {
            Connection con = connectionClass.CONN();
            if (con == null) {
            } else {

                String query = " select ID, sum(carburant) as carburant, sum(electriscite) as electriscite from datasets ";


                Statement stmt = con.createStatement();
                // stmt.executeUpdate(query);


                ResultSet rs = stmt.executeQuery(query);

                while (rs.next()) {
                    visitors.add(new PieEntry(rs.getInt("carburant"),"carburant"));
                    visitors.add(new PieEntry(rs.getInt("electriscite"),"electriscite"));
                }
                PieDataSet pieDataSet = new PieDataSet(visitors,"Consomation");
                pieDataSet.setColors(ColorTemplate.COLORFUL_COLORS);
                pieDataSet.setValueTextColor(Color.BLACK);
                pieDataSet.setValueTextSize(16f);

                PieData pieData = new PieData(pieDataSet);

                pieChart.setData(pieData);
                pieChart.getDescription().setEnabled(false);
                pieChart.setCenterText("Consomation");
                pieChart.animate();

            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}