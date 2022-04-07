package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SwitchCompat;

import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import com.example.mygreenhouse.R.drawable;


public class LampeControle extends AppCompatActivity {
    SwitchCompat switchCompat;
    ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lampe_controle);

        switchCompat = findViewById(R.id.btn_lampe);
        imageView = findViewById(R.id.img_lampe);

        imageView.setImageDrawable(getResources().getDrawable(R.drawable.light_off));
        switchCompat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (switchCompat.isChecked()){
                    imageView.setImageDrawable(getResources().getDrawable(drawable.light_on));
                }else {
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.light_off));
                }
            }
        });
    }

}