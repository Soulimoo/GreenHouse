package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SwitchCompat;

import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class ReservoirControole extends AppCompatActivity {

    SwitchCompat switchCompat;
    ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reservoir_controole);

        switchCompat = findViewById(R.id.btn_reser);
        imageView = findViewById(R.id.img_reser);

        imageView.setImageDrawable(getResources().getDrawable(R.drawable.reser_off));
        switchCompat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (switchCompat.isChecked()){
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.reser_on));
                }else {
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.reser_off));
                }
            }
        });
    }
}