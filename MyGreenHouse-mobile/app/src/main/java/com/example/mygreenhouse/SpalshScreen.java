package com.example.mygreenhouse;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ActivityOptions;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.util.Pair;
import android.view.View;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;

public class SpalshScreen extends AppCompatActivity {
    private static int SPLASH_SCREEN=3000;

    //Variables
    TextView My,Green,House,missour,std,devp;
    ImageView image;

    //Animations
    Animation topAnimation, bottomAnimation,middleAnimation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_main);

        //Animation
        topAnimation = AnimationUtils.loadAnimation(this,R.anim.top_animation);
        bottomAnimation = AnimationUtils.loadAnimation(this,R.anim.bottom_animation);
        middleAnimation = AnimationUtils.loadAnimation(this,R.anim.midel_animation);

        //Hooks
        image = findViewById(R.id.logo);
        My = findViewById(R.id.My);
        Green = findViewById(R.id.Green);
        House = findViewById(R.id.House);
        missour = findViewById(R.id.miss);
        std = findViewById(R.id.std);
        devp = findViewById(R.id.dev);

        //Setting Animation
        //image.setAnimation(topAnimation);
      //  My.setAnimation(middleAnimation);
       // Green.setAnimation(middleAnimation);
        //House.setAnimation(middleAnimation);
        //missour.setAnimation(middleAnimation);
        //std.setAnimation(middleAnimation);
       // devp.setAnimation(bottomAnimation);

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                Intent intent = new Intent(SpalshScreen.this,Login.class);

                startActivity(intent);
            }
        },SPLASH_SCREEN);

    }
}