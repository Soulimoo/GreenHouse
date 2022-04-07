package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SwitchCompat;

import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class IrrigationControle extends AppCompatActivity {

    SwitchCompat switchCompat;
    ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_irrigation_controle);

        switchCompat = findViewById(R.id.btn_irrig);
        imageView = findViewById(R.id.img_irrig);

        imageView.setImageDrawable(getResources().getDrawable(R.drawable.irrig_off));
        switchCompat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (switchCompat.isChecked()){
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.irrig_on));
                }else {
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.irrig_off));
                }
            }
        });
    }
}