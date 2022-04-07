package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SwitchCompat;

import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class VentilateurControle extends AppCompatActivity {

    SwitchCompat switchCompat;
    ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ventilateur_controle);


        switchCompat = findViewById(R.id.btn_venti);
        imageView = findViewById(R.id.img_venti);

        imageView.setImageDrawable(getResources().getDrawable(R.drawable.venti_off));
        switchCompat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (switchCompat.isChecked()){
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.venti_on));
                }else {
                    imageView.setImageDrawable(getResources().getDrawable(R.drawable.venti_off));
                }
            }
        });
    }
}