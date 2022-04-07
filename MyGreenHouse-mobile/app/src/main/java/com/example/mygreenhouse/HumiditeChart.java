package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.os.Bundle;

import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;
import com.github.mikephil.charting.data.PieEntry;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class HumiditeChart extends AppCompatActivity {
    ConnectionClass connectionClass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_humidite_chart);
        connectionClass = new ConnectionClass();

        LineChart lineChart = findViewById(R.id.lineChart);
        ArrayList<Entry> visitors = new ArrayList<>();

        try {
            Connection con = connectionClass.CONN();
            if (con == null) {
            } else {

                String query = " select ID, humiditesol, humiditeaire  from datasets ";

                Statement stmt = con.createStatement();

                // stmt.executeUpdate(query);

                ResultSet rs = stmt.executeQuery(query);
                while (rs.next()) {
                    visitors.add(new Entry(rs.getInt("ID"), rs.getInt("humiditesol")));
                    visitors.add(new Entry(rs.getInt("ID"), rs.getInt("humiditeaire")));
                }
                LineDataSet lineDataSet = new LineDataSet(visitors,"Humidite");

                LineData lineData = new LineData(lineDataSet);

                lineChart.setData(lineData);
                lineChart.getDescription().setEnabled(false);
                lineChart.animate();

            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

    }
}